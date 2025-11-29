<script setup lang="ts">
import { cn } from '@/lib/utils';
import * as THREE from 'three';
import { onMounted, onUnmounted, ref, watch, type HTMLAttributes } from 'vue';

const props = defineProps<{
    class?: HTMLAttributes['class'];
}>();

const containerRef = ref<HTMLDivElement | null>(null);

// We will use a ref to hold the theme, detected from the HTML class
const currentTheme = ref(document.documentElement.classList.contains('dark') ? 'dark' : 'light');

// Refs to hold the Three.js scene objects for cleanup
let scene: THREE.Scene;
let camera: THREE.PerspectiveCamera;
let renderer: THREE.WebGLRenderer;
let points: THREE.Points;
let animationId: number;

const updateParticleColors = (theme: 'dark' | 'light') => {
    if (!points) return;

    const colors: number[] = [];
    const color = theme === 'dark' ? new THREE.Color(0xcccccc) : new THREE.Color(0x000000);
    const colorAttribute = points.geometry.getAttribute('color') as THREE.BufferAttribute;

    for (let i = 0; i < colorAttribute.count; i++) {
        colors.push(color.r, color.g, color.b);
    }

    points.geometry.setAttribute('color', new THREE.Float32BufferAttribute(colors, 3));
    colorAttribute.needsUpdate = true;
};

onMounted(() => {
    if (!containerRef.value) return;

    const SEPARATION = 150;
    const AMOUNTX = 40;
    const AMOUNTY = 60;

    // Scene setup
    scene = new THREE.Scene();
    scene.fog = new THREE.Fog(0xffffff, 2000, 10000);

    camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 1, 10000);
    camera.position.set(0, 355, 1220);

    renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setClearColor(0x000000, 0); // Transparent background

    containerRef.value.appendChild(renderer.domElement);

    // Create particles
    const positions: number[] = [];
    const initialColors: number[] = [];
    const initialColor = currentTheme.value === 'dark' ? new THREE.Color(0xcccccc) : new THREE.Color(0x000000);

    for (let ix = 0; ix < AMOUNTX; ix++) {
        for (let iy = 0; iy < AMOUNTY; iy++) {
            const x = ix * SEPARATION - (AMOUNTX * SEPARATION) / 2;
            const y = 0; // Will be animated
            const z = iy * SEPARATION - (AMOUNTY * SEPARATION) / 2;
            positions.push(x, y, z);
            initialColors.push(initialColor.r, initialColor.g, initialColor.b);
        }
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.Float32BufferAttribute(positions, 3));
    geometry.setAttribute('color', new THREE.Float32BufferAttribute(initialColors, 3));

    const material = new THREE.PointsMaterial({
        size: 8,
        vertexColors: true,
        transparent: true,
        opacity: 0.8,
        sizeAttenuation: true,
    });

    points = new THREE.Points(geometry, material);
    scene.add(points);

    let count = 0;

    const animate = () => {
        animationId = requestAnimationFrame(animate);
        const positionAttribute = points.geometry.getAttribute('position') as THREE.BufferAttribute;
        const positionsArray = positionAttribute.array as Float32Array;

        let i = 0;
        for (let ix = 0; ix < AMOUNTX; ix++) {
            for (let iy = 0; iy < AMOUNTY; iy++) {
                positionsArray[i * 3 + 1] = Math.sin((ix + count) * 0.3) * 50 + Math.sin((iy + count) * 0.5) * 50;
                i++;
            }
        }
        positionAttribute.needsUpdate = true;
        renderer.render(scene, camera);
        count += 0.1;
    };

    const handleResize = () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    };

    window.addEventListener('resize', handleResize);
    animate();

    // Watch for theme changes via class on <html> element
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                const isDark = (mutation.target as HTMLElement).classList.contains('dark');
                currentTheme.value = isDark ? 'dark' : 'light';
            }
        });
    });
    observer.observe(document.documentElement, { attributes: true });
});

// Watch our local theme ref and update colors when it changes
watch(currentTheme, (newTheme) => {
    updateParticleColors(newTheme);
});

onUnmounted(() => {
    if (animationId) cancelAnimationFrame(animationId);

    // Clean up Three.js objects
    if (scene) {
        scene.traverse((object) => {
            if (object instanceof THREE.Points) {
                object.geometry.dispose();
                if (Array.isArray(object.material)) {
                    object.material.forEach((m) => m.dispose());
                } else {
                    object.material.dispose();
                }
            }
        });
    }

    if (renderer) renderer.dispose();
    if (containerRef.value && renderer?.domElement) {
        containerRef.value.removeChild(renderer.domElement);
    }
});
</script>

<template>
    <div ref="containerRef" :class="cn('pointer-events-none fixed inset-0 -z-10', props.class)" />
</template>
