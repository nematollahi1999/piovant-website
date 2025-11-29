import '../css/app.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';

import { initializeTheme } from './composables/useAppearance';

// Defensive: catch decrypted-history failures originating from the Inertia history
// decryption and recover by clearing sessionStorage and reloading once. This
// avoids a fatal uncaught exception for users who have stale/corrupt history
// entries (e.g., after a key change).
if (typeof window !== 'undefined') {
    let reloaded = false

    const handleRecovery = (reason: any) => {
        try {
            const message = reason?.message || String(reason)
            if (message && (message.includes('Unable to decrypt history') || message.toLowerCase().includes('decrypt history') || message.toLowerCase().includes('decrypt'))) {
                console.warn('Detected history decryption failure — clearing sessionStorage and reloading to recover', message)
                try {
                    sessionStorage.clear()
                } catch (e) {
                    console.warn('Failed to clear sessionStorage during recovery', e)
                }

                if (!reloaded) {
                    reloaded = true
                    // small timeout to allow handler to finish
                    setTimeout(() => location.reload(), 50)
                }
            }
        } catch (e) {
            // ignore
        }
    }

    window.addEventListener('unhandledrejection', (event) => {
        handleRecovery(event.reason)
    })

    window.addEventListener('error', (event) => {
        handleRecovery((event as any).error ?? event.message)
    })
}

if (typeof document !== 'undefined') {
    document.addEventListener('inertia:finish', () => {
        try {
            const props = (window as any).__INERTIA?.page?.props ?? {};
            const locale = props.locale ?? '(none)';
            const translations = props.translations ?? {};
            console.info('[i18n-debug] Inertia finished — locale:', locale, 'translations keys:', Object.keys(translations).length);
        } catch (e) {
            // ignore
        }
    });
}

// Direction handling: apply `lang` and `dir` attributes and an optional `rtl`
// body class when the active locale is a right-to-left language (e.g. 'fa').
const RTL_LOCALES = ['ar', 'fa', 'he', 'ur'];

function readLocaleFromPropsOrCookie(): string {
    try {
        const props = (window as any).__INERTIA?.page?.props ?? {};
        if (props.locale) return String(props.locale);
        // If the server already rendered the document.lang, prefer that
        const docLang = document.documentElement?.lang;
        if (docLang) return docLang.slice(0, 2);

        const match = document.cookie.match(/locale=([^;]+)/);
        if (match && match[1]) return match[1];

        if (navigator.language) return navigator.language.slice(0, 2);
    } catch (e) {
        // ignore
    }

    // Default to English if nothing found — server config may set a different
    // default (e.g., 'fa'), but use 'en' as safe client fallback.
    return 'en';
}

function applyDocumentDirection(locale?: string) {
    try {
        const loc = locale ?? readLocaleFromPropsOrCookie();
        const isRtl = RTL_LOCALES.includes(loc);

        // Set HTML lang and dir attributes
        if (document.documentElement) {
            document.documentElement.lang = loc;
            document.documentElement.dir = isRtl ? 'rtl' : 'ltr';
        }

        // Toggle a body class so CSS can react (optional)
        if (document.body) {
            document.body.classList.toggle('rtl', isRtl);
            document.body.classList.toggle('ltr', !isRtl);
        }
    } catch (e) {
        // ignore
    }
}

// Swap directional utility classes (Tailwind) across the DOM for RTL support.
// This is a pragmatic, runtime approach that preserves each element's original
// class list in `data-orig-class` and applies swapped variants when in RTL.
function swapDirectionalToken(token: string): string {
    // handle responsive/prefixed classes like md:ml-4 by transforming the last segment
    const idx = token.lastIndexOf(':');
    const prefix = idx !== -1 ? token.slice(0, idx + 1) : '';
    let base = idx !== -1 ? token.slice(idx + 1) : token;

    const leadingMinus = base.startsWith('-');
    if (leadingMinus) base = base.slice(1);

    // mapping rules
    if (base.startsWith('ml-')) base = 'mr-' + base.slice(3);
    else if (base.startsWith('mr-')) base = 'ml-' + base.slice(3);
    else if (base.startsWith('pl-')) base = 'pr-' + base.slice(3);
    else if (base.startsWith('pr-')) base = 'pl-' + base.slice(3);
    else if (base === 'text-left') base = 'text-right';
    else if (base === 'text-right') base = 'text-left';
    else if (base === 'float-left') base = 'float-right';
    else if (base === 'float-right') base = 'float-left';
    else if (base.startsWith('left-')) base = 'right-' + base.slice(5);
    else if (base.startsWith('right-')) base = 'left-' + base.slice(6);

    return prefix + (leadingMinus ? '-' : '') + base;
}

// Swap attribute values such as "left" <-> "right" or "start" <-> "end"
function swapDirectionalAttrValue(val: string): string {
    if (!val) return val;
    // handle values that may include hyphens or spaces like "bottom-start"
    return val
        .split(/\s+/)
        .map((part) => {
            if (part === 'left') return 'right';
            if (part === 'right') return 'left';
            if (part === 'start') return 'end';
            if (part === 'end') return 'start';
            return part;
        })
        .join(' ');
}

function invertTranslateX(transform: string): string {
    // Very small parser: find translateX(...) or translate3d(...) or translate(...)
    return transform.replace(/translate3d\(([^,]+),([^,]+),([^\)]+)\)/g, (m, x, y, z) => {
        const nx = negateCssNumber(x.trim());
        return `translate3d(${nx},${y},${z})`;
    }).replace(/translateX\(([^\)]+)\)/g, (m, x) => `translateX(${negateCssNumber(x.trim())})`).replace(/translate\(([^,]+),([^\)]+)\)/g, (m, x, y) => `translate(${negateCssNumber(x.trim())},${y})`);
}

function negateCssNumber(s: string): string {
    // handles px, %, em, rem, numbers, calc()
    if (s.startsWith('calc(')) {
        return `calc(-1 * ${s.slice(5)}`; // best-effort
    }
    // attempt numeric parse
    const matched = s.match(/^(-?\d*\.?\d+)(.*)$/);
    if (matched) {
        const n = parseFloat(matched[1]);
        const unit = matched[2] || '';
        return `${-n}${unit}`;
    }
    // fallback: prepend a negative sign if not present
    return s.startsWith('-') ? s.slice(1) : `-${s}`;
}

function swapTransformOrigin(origin: string): string {
    return origin.split(/\s+/).map((part) => {
        if (part === 'left') return 'right';
        if (part === 'right') return 'left';
        return part;
    }).join(' ');
}

// We'll keep a reference to the DOM observer and a scheduled timer so we can
// debounce updates and avoid causing attribute-mutation feedback loops when
// we rewrite element classNames (which would otherwise re-trigger the
// MutationObserver and potentially create an infinite update cycle).
let domObserver: MutationObserver | null = null;
let transformScheduled: number | null = null;

function transformDirectionalClassesForAll(isRtl: boolean) {
    try {
        // If an observer exists, temporarily disconnect it while we perform the
        // bulk className rewrites to avoid re-entrancy / feedback loops.
        if (domObserver) {
            try { domObserver.disconnect(); } catch (err) { /* ignore */ }
        }

        // Narrow the set of elements to examine by selecting only nodes whose
        // class attribute likely contains directional utilities. This avoids
        // scanning the entire DOM on every mutation which can be expensive.
        const selector = [
            '[class*="ml-"]',
            '[class*="mr-"]',
            '[class*="pl-"]',
            '[class*="pr-"]',
            '[class*="text-left"]',
            '[class*="text-right"]',
            '[class*="float-left"]',
            '[class*="float-right"]',
            '[class*="left-"]',
            '[class*="right-"]'
        ].join(',');

        const candidates = document.querySelectorAll(selector);
        candidates.forEach((el) => {
            const e = el as HTMLElement;
            if (!e.dataset.origClass) {
                // preserve original class list once
                e.dataset.origClass = e.className;
            }

            const orig = e.dataset.origClass ?? '';

            if (isRtl) {
                // compute swapped class list from original
                const tokens = orig.split(/\s+/).filter(Boolean);
                const mapped = tokens.map((t) => swapDirectionalToken(t)).join(' ');
                // Only mutate the className if it actually changes to avoid
                // re-triggering mutation observers unnecessarily.
                if (mapped && mapped !== e.className) {
                    e.className = mapped;
                }
            } else {
                // restore original only if different
                if (orig && orig !== e.className) {
                    e.className = orig;
                }
            }
        });

        // Additionally swap directional placement attributes and some inline
        // styles used by dropdowns/popovers/dialogs so libraries that set
        // data-side or data-popper-placement get flipped in RTL.
        const attrList = ['data-side', 'data-popper-placement', 'data-placement'];
        attrList.forEach((attr) => {
            const nodes = document.querySelectorAll(`[${attr}]`);
            nodes.forEach((node) => {
                const el = node as HTMLElement & { dataset: DOMStringMap };
                const current = el.getAttribute(attr) ?? '';
                const key = `orig_${attr.replace(/[^a-z0-9]/gi, '_')}`;
                if (!el.dataset[key]) {
                    el.dataset[key] = current;
                }

                const origVal = el.dataset[key] ?? current;
                if (isRtl) {
                    const swapped = swapDirectionalAttrValue(origVal);
                    if (swapped && swapped !== current) el.setAttribute(attr, swapped);
                } else {
                    // restore original value
                    if (origVal && origVal !== current) el.setAttribute(attr, origVal);
                }
            });
        });

        // Swap inline left/right styles for elements that rely on inline positioning
        const inlineNodes = document.querySelectorAll('[style]');
        inlineNodes.forEach((node) => {
            const el = node as HTMLElement & { dataset: DOMStringMap };
            try {
                const s = el.style;
                // preserve originals
                if (!el.dataset.origStyleLeft && s.left) el.dataset.origStyleLeft = s.left;
                if (!el.dataset.origStyleRight && s.right) el.dataset.origStyleRight = s.right;
                if (!el.dataset.origStyleMarginLeft && s.marginLeft) el.dataset.origStyleMarginLeft = s.marginLeft;
                if (!el.dataset.origStyleMarginRight && s.marginRight) el.dataset.origStyleMarginRight = s.marginRight;
                if (!el.dataset.origStyleTransform && s.transform) el.dataset.origStyleTransform = s.transform;
                if (!el.dataset.origStyleTransformOrigin && s.transformOrigin) el.dataset.origStyleTransformOrigin = s.transformOrigin;

                if (isRtl) {
                    // move left -> right, margin-left -> margin-right, etc.
                    if (s.left) {
                        s.right = el.dataset.origStyleLeft ?? s.left;
                        s.left = '';
                    }
                    if (s.marginLeft) {
                        s.marginRight = el.dataset.origStyleMarginLeft ?? s.marginLeft;
                        s.marginLeft = '';
                    }
                    // invert translateX in transform (translate3d/x)
                    if (s.transform) {
                        const t = s.transform;
                        const inverted = invertTranslateX(t);
                        if (inverted !== t) s.transform = inverted;
                    }
                    // swap transform-origin left/right
                    if (s.transformOrigin) {
                        s.transformOrigin = swapTransformOrigin(s.transformOrigin);
                    }
                } else {
                    // restore originals if present
                    if (el.dataset.origStyleLeft) {
                        s.left = el.dataset.origStyleLeft;
                        s.right = '';
                    }
                    if (el.dataset.origStyleMarginLeft) {
                        s.marginLeft = el.dataset.origStyleMarginLeft;
                        s.marginRight = el.dataset.origStyleMarginRight ?? '';
                    }
                    // restore original transform and transform-origin
                    if (el.dataset.origStyleTransform) {
                        s.transform = el.dataset.origStyleTransform;
                    }
                    if (el.dataset.origStyleTransformOrigin) {
                        s.transformOrigin = el.dataset.origStyleTransformOrigin;
                    }
                }
            } catch (err) {
                // ignore any style access issues
            }
        });
    } catch (e) {
        // ignore
    } finally {
        // Reconnect the observer after updates so it can continue watching for
        // legitimate external DOM changes. We re-attach with the same options
        // used when the observer was initially created below.
        if (domObserver) {
            try {
                domObserver.observe(document.documentElement || document.body, {
                    childList: true,
                    subtree: true,
                    attributes: true,
                    attributeFilter: ['class', 'style', 'data-side', 'data-popper-placement', 'data-placement'],
                });
            } catch (err) {
                // ignore
            }
        }
    }
}

// Ensure directional classes are transformed when direction changes
if (typeof document !== 'undefined') {
    // initial
    applyDocumentDirection();
    transformDirectionalClassesForAll(RTL_LOCALES.includes(readLocaleFromPropsOrCookie()));

    // on Inertia finish, re-apply direction and transformed classes
    document.addEventListener('inertia:finish', () => {
        try {
            const props = (window as any).__INERTIA?.page?.props ?? {};
            const loc = props.locale ?? readLocaleFromPropsOrCookie();
            const isRtl = RTL_LOCALES.includes(loc);
            applyDocumentDirection(loc);
            transformDirectionalClassesForAll(isRtl);
        } catch (e) {
            // ignore
        }
    });

    // Watch for DOM changes (new nodes added by Inertia or components) and
    // re-run the transformation for any new elements so dynamically inserted
    // components also get RTL class swapping.
    try {
        // Keep the observer in the outer-scope so transformDirectionalClassesForAll
        // can disconnect/reconnect it safely. Debounce rapid mutation bursts to
        // avoid repeated expensive DOM rewrites.
        domObserver = new MutationObserver((mutations) => {
            let needs = false;
            const watchedAttrs = ['class', 'style', 'data-side', 'data-popper-placement', 'data-placement'];
            for (const m of mutations) {
                if (m.type === 'childList' && (m.addedNodes?.length || m.removedNodes?.length)) {
                    needs = true;
                    break;
                }
                if (m.type === 'attributes' && watchedAttrs.includes(String(m.attributeName))) {
                    needs = true;
                    break;
                }
            }

            if (needs) {
                // Debounce so multiple fast mutations only trigger one transform.
                try {
                    if (transformScheduled) {
                        window.clearTimeout(transformScheduled);
                    }
                } catch (err) {
                    // ignore
                }

                transformScheduled = window.setTimeout(() => {
                    transformScheduled = null;
                    try {
                        const loc = readLocaleFromPropsOrCookie();
                        transformDirectionalClassesForAll(RTL_LOCALES.includes(loc));
                    } catch (err) {
                        // ignore
                    }
                }, 50);
            }
        });

        domObserver.observe(document.documentElement || document.body, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ['class', 'style', 'data-side', 'data-popper-placement', 'data-placement'],
        });
    } catch (e) {
        // ignore
    }
}

// Apply on initial load
if (typeof document !== 'undefined') {
    applyDocumentDirection();

    // Re-apply after Inertia navigations
    document.addEventListener('inertia:finish', () => {
        try {
            const props = (window as any).__INERTIA?.page?.props ?? {};
            applyDocumentDirection(props.locale);
        } catch (e) {
            // ignore
        }
    });
}

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

// This will set light / dark mode on page load...
initializeTheme();
