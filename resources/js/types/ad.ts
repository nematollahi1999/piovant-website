// resources/js/types/ad.ts

// String literal unions are often better than enums in modern TS/JS
export type AdType = 'normal' | 'urgent' | 'auction';
export type AdCategory = 'real_estate' | 'vehicles' | 'digital_goods' | 'personal_items';

// For vehicle-specific details
export type VehicleBodyStatus = 'salam' | 'bi_rang' | 'khat_o_khash' | 'rang_shodegi' | 'taviz';
export type GeneralStatus = 'salam' | 'tamir_shode' | 'taviz'; // For chassis, engine, etc.

// The common properties for ALL ads
interface BaseAd {
  id: number;
  slug: string; // for the URL
  title: string;
  description: string;
  value: number; // ارزش معامله
  adType: AdType; // نوع آگهی: عادی، فوری، مزایده
  images: string[]; // Array of image URLs
  location: string; // The city name, e.g., "تهران"
  createdAt: string; // ISO date string, e.g., "2023-10-27T10:00:00Z"
  owner: {
    id: number;
    name: string;
    avatarUrl?: string;
  };
  
  // Details about the exchange preferences
  exchangeDetails: {
    // تمایل به معاوضه با چه دسته هایی
    exchangeableWith: AdCategory[];
    // تمایل به دریافت اختلاف
    willingToReceiveDifference: boolean;
    // تمایل به پرداخت اختلاف
    willingToPayDifference: boolean;
    // توانایی پرداخت اختلاف
    maxPayableAmount?: number;
  };

  // For auction ads
  auctionEndTime?: string; // ISO date string, only if adType is 'auction'
}

// Specific details for each category
interface RealEstateDetails {
  area: number; // متراژ
  roomCount: number; // تعداد اتاق
  buildYear: number; // سال ساخت
  floor: number; // طبقه
  hasStorage: boolean; // انباری
  hasElevator: boolean; // آسانسور
  hasParking: boolean; // پارکینگ
  mapCoordinates: { lat: number, lng: number }; // موقعیت ملک روی نقشه
}

interface VehicleDetails {
  brand: string; // برند
  model: string;
  mileage: number; // کارکرد
  productionYear: number; // سال تولید
  fuelType: 'gasoline' | 'electric' | 'diesel' | 'cng'; // نوع سوخت
  bodyStatus: VehicleBodyStatus; // وضعیت بدنه
  frontChassisStatus: GeneralStatus; // وضعیت شاسی جلو
  rearChassisStatus: GeneralStatus; // وضعیت شاسی عقب
  engineStatus: GeneralStatus; // وضعیت موتور
  gearboxStatus: GeneralStatus; // وضعیت گیربکس
  hasTuning?: boolean; // تیونینگ
}

// For digital and personal items, details are simpler
interface GenericItemDetails {
  condition: 'new' | 'used'; // وضعیت کالا
}

// This is the final, powerful Ad type you will use everywhere.
// It combines the base ad with the specific details based on the category.
export type Ad = 
  | BaseAd & { category: 'real_estate'; details: RealEstateDetails; }
  | BaseAd & { category: 'vehicles'; details: VehicleDetails; }
  | BaseAd & { category: 'digital_goods'; details: GenericItemDetails; }
  | BaseAd & { category: 'personal_items'; details: GenericItemDetails; };

// Type for a user's offer on an ad
export interface AdOffer {
  id: number;
  user: {
    name: string;
    avatarUrl?: string;
  };
  offeredAd: { // The ad they are offering in return
    id: number;
    title: string;
    thumbnailUrl: string;
    value: number;
  }
}