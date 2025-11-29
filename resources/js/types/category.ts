// resources/js/types/category.ts
import type { AdCategory as AdCategorySlug } from './ad';

export interface Category {
  id: AdCategorySlug; // 'real_estate', 'vehicles', etc.
  name: string; // 'املاک و مستغلات', 'وسایل نقلیه', etc.
  adCount: number;
}