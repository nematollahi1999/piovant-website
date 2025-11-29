// resources/js/route-helper.ts

/**
 * This file acts as a clean entry point for accessing all auto-generated routes
 * from Wayfinder. It imports all named exports from the generated 'index.ts'
 * file and re-exports them under a single 'routes' object.
 *
 * Your Wayfinder is generating a single, flat file, so this is all we need.
 *
 * Example Usage:
 * import { routes } from '@/route-helper';
 *
 * routes.home.url();
 * routes.dashboard.url();
 * routes.listings.show.url({ listing: 'my-slug' });
 */

// Import all named exports (like 'home', 'dashboard', 'login', etc.)
// from the auto-generated file under a single alias.
import * as allRoutes from './routes/index';

// Re-export this collection as a single 'routes' object.
export const routes = allRoutes;