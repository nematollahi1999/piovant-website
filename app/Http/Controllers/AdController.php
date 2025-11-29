<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Arr;

class AdController extends Controller
{
    /**
     * Display the specified ad using mock data.
     *
     * @param  string  $slug
     * @return \Inertia\Response
     */
    public function show(string $slug)
    {
        // 1. Define all your mock data here as a PHP array.
        // Paste this entire array into your AdController's `show` method.

// Paste this entire array into your AdController's `show` method.

$mockAds = [
    [
        'id' => 1,
        'slug' => 'villa-shomal-modern',
        'title' => 'ویلا مدرن ۳ خوابه در شمال',
        'value' => 12500000000,
        'adType' => 'urgent',
        'category' => 'real_estate',
        'images' => ['https://picsum.photos/seed/house1/800/600', 'https://picsum.photos/seed/house1-2/800/600', 'https://picsum.photos/seed/house1-3/800/600', 'https://picsum.photos/seed/house1-4/800/600', 'https://picsum.photos/seed/house1-5/800/600'],
        'location' => 'تهران',
        'createdAt' => '2023-10-27T10:00:00Z',
        'description' => 'این ویلا در بهترین نقطه شمال واقع شده و دارای امکانات کامل رفاهی، استخر و چشم‌انداز بی‌نظیر به جنگل می‌باشد. کاملا مدرن و نوساز با معماری اروپایی. سند تک برگ و آماده انتقال. مناسب برای سرمایه‌گذاری یا استفاده شخصی. دسترسی آسان به دریا و مراکز خرید.',
        'exchangeDetails' => ['exchangeableWith' => ['vehicles', 'digital_goods'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => [
            'area' => 350,
            'buildYear' => 1401,
            'roomCount' => 3,
            'floor' => 2,
            'amenities' => ['elevator' => false, 'parking' => true, 'storage' => true],
        ],
        'offers' => [
            ['id' => 101, 'user' => ['name' => 'علی رضایی'], 'ad' => ['id' => 12, 'value' => 12500000000, 'adType' => 'normal', 'slug' => 'hyundai-santafe-2017', 'title' => 'هیوندای سانتافه ۲۰۱۷ فول آپشن', 'images' => ['https://picsum.photos/seed/car3/400/300'], 'exchangeDetails' => ['willingToPayDifference' => true, 'maxPayableAmount' => 500000000]]],
            ['id' => 102, 'user' => ['name' => 'مریم احمدی'], 'ad' => ['id' => 9, 'value' => 12500000000, 'adType' => 'urgent', 'slug' => 'motor-benelli-250', 'title' => 'موتور سیکلت بنلی TNT 250', 'images' => ['https://picsum.photos/seed/moto1/400/300'], 'exchangeDetails' => ['willingToReceiveDifference' => true]]],
        ]
    ],
    [
        'id' => 2,
        'slug' => 'peugeot-207-salam',
        'title' => 'پژو ۲۰۷ سفید مدل ۱۴۰۱',
        'value' => 850000000,
        'adType' => 'auction',
        'category' => 'vehicles',
        'images' => ['https://picsum.photos/seed/car1/800/600', 'https://picsum.photos/seed/car1-2/800/600'],
        'location' => 'اصفهان',
        'createdAt' => '2023-10-26T15:30:00Z',
        'auctionEndTime' => now()->addDays(2)->addHours(4)->addMinutes(37)->toISOString(),
        'description' => 'خودرو بسیار سالم و کم کارکرد، بدون رنگ و خط و خش. تمامی سرویس‌ها به موقع انجام شده و بیمه کامل دارد.',
        'exchangeDetails' => ['exchangeableWith' => ['real_estate'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => true, 'maxPayableAmount' => 100000000],
        'details' => [
            'mileage' => 15000,
            'productionYear' => 1401,
            'color' => 'سفید',
            'ownerEvaluation' => ['engine' => 'سالم', 'body' => 'بدون رنگ', 'chassis' => 'پلمپ'],
            'features' => ['inspectionReport' => true, 'thirdPartyInsurance' => true],
        ],
        'offers' => []
    ],
    [
        'id' => 3,
        'slug' => 'macbook-pro-m2',
        'title' => 'مک‌بوک پرو M2 در حد نو',
        'value' => 98000000,
        'adType' => 'normal',
        'category' => 'digital_goods',
        'images' => ['https://picsum.photos/seed/laptop1/800/600'],
        'location' => 'مشهد',
        'createdAt' => '2023-10-25T08:00:00Z',
        'description' => 'لپتاپ اپل با پردازنده M2، بسیار تمیز و مناسب کارهای گرافیکی سنگین. دارای جعبه و تمامی لوازم جانبی اصلی.',
        'exchangeDetails' => ['exchangeableWith' => ['digital_goods', 'personal_items'], 'willingToReceiveDifference' => false, 'willingToPayDifference' => false],
        'details' => [
        'brand' => 'Apple',
        'itemType' => 'لپ‌تاپ',
        'appearance' => 'در حد نو',
        'usage' => '۶ ماه',
        'functionality' => 'کاملا سالم',
    ],
        'offers' => []
    ],
    [
        'id' => 4,
        'slug' => 'saat-rolex-asl',
        'title' => 'ساعت رولکس اصل با جعبه',
        'value' => 450000000,
        'adType' => 'normal',
        'category' => 'personal_items',
        'images' => ['https://picsum.photos/seed/watch1/800/600'],
        'location' => 'شیراز',
        'createdAt' => '2023-10-24T18:45:00Z',
        'description' => 'ساعت رولکس اصل، کاملا سالم و دقیق، همراه با جعبه و مدارک کامل. یک آیتم کلکسیونی و ارزشمند.',
        'exchangeDetails' => ['exchangeableWith' => ['vehicles'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => [
            'appearance' => 'کاملا نو',
            'usage' => 'استفاده نشده',
            'functionality' => 'کاملا سالم',
        ],
        'offers' => []
    ],
    [
        'id' => 5,
        'slug' => 'pride-131-salam',
        'title' => 'پراید ۱۳۱ سالم و تمیز',
        'value' => 310000000,
        'adType' => 'normal',
        'category' => 'vehicles',
        'images' => ['https://picsum.photos/seed/car2/800/600'],
        'location' => 'کرج',
        'createdAt' => '2023-10-27T08:00:00Z',
        'description' => 'پراید ۱۳۱ مدل ۹۸، فنی کاملا سالم، مناسب برای مصرف کننده. بدون هیچگونه خرج اضافی.',
        'exchangeDetails' => ['exchangeableWith' => ['digital_goods'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => [
            'mileage' => 85000,
            'productionYear' => 1398,
            'color' => 'سفید',
            'ownerEvaluation' => ['engine' => 'سالم', 'body' => 'چند لکه رنگ', 'chassis' => 'ترافیکی عقب'],
            'features' => ['inspectionReport' => false, 'thirdPartyInsurance' => true],
        ],
        'offers' => []
    ],
    [
        'id' => 6,
        'slug' => 'iphone-13-pro-max',
        'title' => 'آیفون ۱۳ پرومکس ۲۵۶ گیگ در حد نو',
        'value' => 72000000,
        'adType' => 'urgent',
        'category' => 'digital_goods',
        'images' => ['https://picsum.photos/seed/phone1/800/600'],
        'location' => 'تهران',
        'createdAt' => '2023-10-27T05:15:00Z',
        'description' => 'گوشی آیفون ۱۳ پرومکس با حافظه ۲۵۶ گیگابایت، رنگ آبی، بدون کوچکترین خط و خش. سلامت باتری ۹۸ درصد.',
        'exchangeDetails' => ['exchangeableWith' => ['vehicles'], 'willingToReceiveDifference' => false, 'willingToPayDifference' => true, 'maxPayableAmount' => 20000000],
        'details' => [
        'brand' => 'Apple',
        'itemType' => 'موبایل',
        'appearance' => 'در حد نو',
        'usage' => '۶ ماه',
        'functionality' => 'کاملا سالم',
    ],
        'offers' => []
    ],
    [
        'id' => 7,
        'slug' => 'aparteman-75m-markaz-shahr',
        'title' => 'آپارتمان ۷۵ متری مرکز شهر اصفهان',
        'value' => 4300000000,
        'adType' => 'normal',
        'category' => 'real_estate',
        'images' => ['https://picsum.photos/seed/house2/800/600'],
        'location' => 'اصفهان',
        'createdAt' => '2023-10-26T20:00:00Z',
        'description' => 'آپارتمان دو خوابه در بهترین نقطه مرکز شهر اصفهان با دسترسی عالی به تمام امکانات شهری.',
        'exchangeDetails' => ['exchangeableWith' => ['real_estate'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => true],
        'details' => [
            'area' => 75,
            'buildYear' => 1395,
            'roomCount' => 2,
            'floor' => 3,
            'amenities' => ['elevator' => true, 'parking' => true, 'storage' => false],
        ],
        'offers' => []
    ],
    [
        'id' => 8,
        'slug' => 'set-tala-javaher',
        'title' => 'ست طلا و جواهر ایتالیایی',
        'value' => 280000000,
        'adType' => 'normal',
        'category' => 'personal_items',
        'images' => ['https://picsum.photos/seed/jewelry1/800/600'],
        'location' => 'شیراز',
        'createdAt' => '2023-10-26T18:30:00Z',
        'description' => 'ست کامل طلا و جواهر ساخت ایتالیا، بسیار شیک و خاص. شامل گردنبند، دستبند و گوشواره.',
        'exchangeDetails' => ['exchangeableWith' => ['vehicles', 'real_estate'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => [
            'appearance' => 'کاملا نو',
            'usage' => 'استفاده نشده',
            'functionality' => 'کاملا سالم',
        ],
        'offers' => []
    ],
    [
        'id' => 9,
        'slug' => 'motor-benelli-250',
        'title' => 'موتور سیکلت بنلی TNT 250',
        'value' => 210000000,
        'adType' => 'normal',
        'category' => 'vehicles',
        'images' => ['https://picsum.photos/seed/moto1/800/600'],
        'location' => 'مشهد',
        'createdAt' => '2023-10-26T11:00:00Z',
        'description' => 'موتور بنلی ۲۵۰ سی‌سی دو سیلندر، بسیار پر شتاب و سالم. مدارک کامل و آماده انتقال.',
        'exchangeDetails' => ['exchangeableWith' => ['digital_goods'], 'willingToReceiveDifference' => false, 'willingToPayDifference' => false],
        'details' => [
            'mileage' => 5000,
            'productionYear' => 1400,
            'color' => 'قرمز',
            'ownerEvaluation' => ['engine' => 'سالم', 'body' => 'سالم و بی خط و خش', 'chassis' => 'پلمپ'],
            'features' => ['inspectionReport' => false, 'thirdPartyInsurance' => true],
        ],
        'offers' => []
    ],
    [
        'id' => 10,
        'slug' => 'ps5-console-disk',
        'title' => 'کنسول بازی PS5 دیسک خور',
        'value' => 31000000,
        'adType' => 'normal',
        'category' => 'digital_goods',
        'images' => ['https://picsum.photos/seed/ps5/800/600'],
        'location' => 'تهران',
        'createdAt' => '2023-10-25T22:00:00Z',
        'description' => 'کنسول پلی استیشن ۵ نسخه دیسک خور، همراه با دو دسته و چند بازی. بسیار کم کارکرد و در حد آکبند.',
        'exchangeDetails' => ['exchangeableWith' => ['personal_items'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => true],
        'details' => [
        'brand' => 'Sony',
        'itemType' => 'کنسول',
        'appearance' => 'در حد نو',
        'usage' => '۶ ماه',
        'functionality' => 'کاملا سالم',
    ],
        'offers' => []
    ],
    [
        'id' => 11,
        'slug' => 'zamin-vilayi-damavand',
        'title' => 'زمین ویلایی در دماوند با جواز ساخت',
        'value' => 3500000000,
        'adType' => 'urgent',
        'category' => 'real_estate',
        'images' => ['https://picsum.photos/seed/land1/800/600'],
        'location' => 'تهران',
        'createdAt' => '2023-10-25T14:10:00Z',
        'description' => 'زمین به متراژ ۵۰۰ متر در بهترین منطقه ویلایی دماوند، دارای جواز ساخت و انشعابات کامل.',
        'exchangeDetails' => ['exchangeableWith' => ['vehicles'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => [
            'area' => 500,
            'buildYear' => null,
            'roomCount' => null,
            'floor' => null,
            'amenities' => ['elevator' => false, 'parking' => false, 'storage' => false],
        ],
        'offers' => []
    ],
    [
        'id' => 12,
        'slug' => 'hyundai-santafe-2017',
        'title' => 'هیوندای سانتافه ۲۰۱۷ فول آپشن',
        'value' => 4800000000,
        'adType' => 'auction',
        'category' => 'vehicles',
        'images' => ['https://picsum.photos/seed/car3/800/600'],
        'location' => 'اصفهان',
        'createdAt' => '2023-10-25T12:00:00Z',
        'auctionEndTime' => now()->addDay()->toISOString(),
        'description' => 'سانتافه ۲۰۱۷ فول آپشن، ۴ رادار، سقف پانوراما، بدون رنگ شدگی. فنی به شرط کارشناسی.',
        'exchangeDetails' => ['exchangeableWith' => ['real_estate'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => [
            'mileage' => 110000,
            'productionYear' => 1396,
            'color' => 'مشکی',
            'ownerEvaluation' => ['engine' => 'سالم', 'body' => 'بدون رنگ', 'chassis' => 'پلمپ'],
            'features' => ['inspectionReport' => true, 'thirdPartyInsurance' => true],
        ],
        'offers' => []
    ],
    [
        'id' => 13,
        'slug' => 'kif-dasti-charm-gucci',
        'title' => 'کیف دستی چرم برند گوچی',
        'value' => 65000000,
        'adType' => 'normal',
        'category' => 'personal_items',
        'images' => ['https://picsum.photos/seed/bag1/800/600'],
        'location' => 'تهران',
        'createdAt' => '2023-10-24T19:00:00Z',
        'description' => 'کیف دستی چرم طبیعی برند گوچی، خریداری شده از نمایندگی رسمی. بسیار شیک و جادار.',
        'exchangeDetails' => ['exchangeableWith' => ['digital_goods'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => [
            'appearance' => 'در حد نو',
            'usage' => 'چند بار استفاده شده',
            'functionality' => 'کاملا سالم',
        ],
        'offers' => []
    ],
    [
        'id' => 14,
        'slug' => 'camera-canon-5d-mark-iv',
        'title' => 'دوربین عکاسی کانن 5D Mark IV',
        'value' => 110000000,
        'adType' => 'normal',
        'category' => 'digital_goods',
        'images' => ['https://picsum.photos/seed/camera1/800/600'],
        'location' => 'تبریز',
        'createdAt' => '2023-10-24T11:30:00Z',
        'description' => 'دوربین حرفه‌ای کانن 5D Mark IV همراه با لنز ۲۴-۱۰۵. تعداد شات پایین، مناسب عکاسی حرفه‌ای.',
        'exchangeDetails' => ['exchangeableWith' => ['digital_goods'], 'willingToReceiveDifference' => false, 'willingToPayDifference' => false],
        'details' => [
        'brand' => 'Canon',
        'itemType' => 'دوربین عکاسی',
        'appearance' => 'در حد نو',
        'usage' => '۶ ماه',
        'functionality' => 'کاملا سالم',
    ],
        'offers' => []
    ],
    [
        'id' => 15,
        'slug' => 'camera-canon-5d-mark-iv-2',
        'title' => 'دوربین عکاسی کانن 5D Mark IV',
        'value' => 110000000,
        'adType' => 'normal',
        'category' => 'digital_goods',
        'images' => ['https://picsum.photos/seed/camera1/800/600'],
        'location' => 'تبریز',
        'createdAt' => '2023-10-24T11:30:00Z',
        'description' => 'توضیحات برای دوربین تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['digital_goods'], 'willingToReceiveDifference' => false, 'willingToPayDifference' => false],
        'details' => [
        'brand' => 'Canon',
        'itemType' => 'دوربین عکاسی',
        'appearance' => 'در حد نو',
        'usage' => '۶ ماه',
        'functionality' => 'کاملا سالم',
    ],
        'offers' => []
    ],
    [
        'id' => 16,
        'slug' => 'camera-canon-5d-mark-iv-3',
        'title' => 'دوربین عکاسی کانن 5D Mark IV',
        'value' => 110000000,
        'adType' => 'normal',
        'category' => 'digital_goods',
        'images' => ['https://picsum.photos/seed/camera1/800/600'],
        'location' => 'تبریز',
        'createdAt' => '2023-10-24T11:30:00Z',
        'description' => 'توضیحات برای دوربین تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['digital_goods'], 'willingToReceiveDifference' => false, 'willingToPayDifference' => false],
        'details' => [
        'brand' => 'Canon',
        'itemType' => 'دوربین عکاسی',
        'appearance' => 'در حد نو',
        'usage' => '۶ ماه',
        'functionality' => 'کاملا سالم',
    ],
        'offers' => []
    ],
    [
        'id' => 17,
        'slug' => 'camera-canon-5d-mark-iv-4',
        'title' => 'دوربین عکاسی کانن 5D Mark IV',
        'value' => 110000000,
        'adType' => 'normal',
        'category' => 'digital_goods',
        'images' => ['https://picsum.photos/seed/camera1/800/600'],
        'location' => 'تبریز',
        'createdAt' => '2023-10-24T11:30:00Z',
        'description' => 'توضیحات برای دوربین تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['digital_goods'], 'willingToReceiveDifference' => false, 'willingToPayDifference' => false],
        'details' => [
        'brand' => 'Canon',
        'itemType' => 'دوربین عکاسی',
        'appearance' => 'در حد نو',
        'usage' => '۶ ماه',
        'functionality' => 'کاملا سالم',
    ],
        'offers' => []
    ],
    [
        'id' => 18,
        'slug' => 'pride-131-salam-2',
        'title' => 'پراید ۱۳۱ سالم و تمیز',
        'value' => 310000000,
        'adType' => 'normal',
        'category' => 'vehicles',
        'images' => ['https://picsum.photos/seed/car2/800/600'],
        'location' => 'کرج',
        'createdAt' => '2023-10-27T08:00:00Z',
        'description' => 'توضیحات برای پراید تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['digital_goods'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => ['mileage' => 95000, 'productionYear' => 1397, 'color' => 'نقره‌ای', 'ownerEvaluation' => ['engine' => 'نیاز به تعمیر', 'body' => 'تعویضی', 'chassis' => 'تعمیری'], 'features' => ['inspectionReport' => false, 'thirdPartyInsurance' => false]],
        'offers' => []
    ],
    [
        'id' => 19,
        'slug' => 'iphone-13-pro-max-2',
        'title' => 'آیفون ۱۳ پرومکس ۲۵۶ گیگ در حد نو',
        'value' => 72000000,
        'adType' => 'urgent',
        'category' => 'digital_goods',
        'images' => ['https://picsum.photos/seed/phone1/800/600'],
        'location' => 'تهران',
        'createdAt' => '2023-10-27T05:15:00Z',
        'description' => 'توضیحات برای آیفون تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['vehicles'], 'willingToReceiveDifference' => false, 'willingToPayDifference' => true, 'maxPayableAmount' => 20000000],
        'details' => [
        'brand' => 'Apple',
        'itemType' => ' گوشی موبایل',
        'appearance' => 'در حد نو',
        'usage' => '۶ ماه',
        'functionality' => 'کاملا سالم',
    ],
        'offers' => []
    ],
    [
        'id' => 20,
        'slug' => 'aparteman-75m-markaz-shahr-2',
        'title' => 'آپارتمان ۷۵ متری مرکز شهر اصفهان',
        'value' => 4300000000,
        'adType' => 'normal',
        'category' => 'real_estate',
        'images' => ['https://picsum.photos/seed/house2/800/600'],
        'location' => 'اصفهان',
        'createdAt' => '2023-10-26T20:00:00Z',
        'description' => 'توضیحات برای آپارتمان تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['real_estate'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => true],
        'details' => ['area' => 80, 'buildYear' => 1400, 'roomCount' => 2, 'floor' => 1, 'amenities' => ['elevator' => false, 'parking' => true, 'storage' => true]],
        'offers' => []
    ],
    [
        'id' => 21,
        'slug' => 'set-tala-javaher-2',
        'title' => 'ست طلا و جواهر ایتالیایی',
        'value' => 280000000,
        'adType' => 'normal',
        'category' => 'personal_items',
        'images' => ['https://picsum.photos/seed/jewelry1/800/600'],
        'location' => 'شیراز',
        'createdAt' => '2023-10-26T18:30:00Z',
        'description' => 'توضیحات برای ست طلا تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['vehicles', 'real_estate'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => ['appearance' => 'در حد نو', 'usage' => 'کم استفاده شده', 'functionality' => 'کاملا سالم'],
        'offers' => []
    ],
    [
        'id' => 22,
        'slug' => 'motor-benelli-250-2',
        'title' => 'موتور سیکلت بنلی TNT 250',
        'value' => 210000000,
        'adType' => 'normal',
        'category' => 'vehicles',
        'images' => ['https://picsum.photos/seed/moto1/800/600'],
        'location' => 'مشهد',
        'createdAt' => '2023-10-26T11:00:00Z',
        'description' => 'توضیحات برای موتور بنلی تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['digital_goods'], 'willingToReceiveDifference' => false, 'willingToPayDifference' => false],
        'details' => ['mileage' => 12000, 'productionYear' => 1399, 'color' => 'مشکی', 'ownerEvaluation' => ['engine' => 'تازه تعمیر', 'body' => 'سالم و بی خط و خش', 'chassis' => 'پلمپ'], 'features' => ['inspectionReport' => true, 'thirdPartyInsurance' => true]],
        'offers' => []
    ],
    [
        'id' => 23,
        'slug' => 'ps5-console-disk-2',
        'title' => 'کنسول بازی PS5 دیسک خور',
        'value' => 31000000,
        'adType' => 'normal',
        'category' => 'digital_goods',
        'images' => ['https://picsum.photos/seed/ps5/800/600'],
        'location' => 'تهران',
        'createdAt' => '2023-10-25T22:00:00Z',
        'description' => 'توضیحات برای کنسول بازی تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['personal_items'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => true],
        'details' => [
        'brand' => 'Sony',
        'itemType' => ' کنسول بازی',
        'appearance' => 'در حد نو',
        'usage' => '۶ ماه',
        'functionality' => 'کاملا سالم',
    ],
        'offers' => []
    ],
    [
        'id' => 24,
        'slug' => 'zamin-vilayi-damavand-2',
        'title' => 'زمین ویلایی در دماوند با جواز ساخت',
        'value' => 3500000000,
        'adType' => 'urgent',
        'category' => 'real_estate',
        'images' => ['https://picsum.photos/seed/land1/800/600'],
        'location' => 'تهران',
        'createdAt' => '2023-10-25T14:10:00Z',
        'description' => 'توضیحات برای زمین تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['vehicles'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => ['area' => 600, 'buildYear' => null, 'roomCount' => null, 'floor' => null, 'amenities' => ['elevator' => false, 'parking' => false, 'storage' => false]],
        'offers' => []
    ],
    [
        'id' => 25,
        'slug' => 'hyundai-santafe-2017-2',
        'title' => 'هیوندای سانتافه ۲۰۱۷ فول آپشن',
        'value' => 4800000000,
        'adType' => 'auction',
        'category' => 'vehicles',
        'images' => ['https://picsum.photos/seed/car3/800/600'],
        'location' => 'اصفهان',
        'createdAt' => '2023-10-25T12:00:00Z',
        'auctionEndTime' => now()->addDay()->toISOString(),
        'description' => 'توضیحات برای سانتافه تکراری.',
        'exchangeDetails' => ['exchangeableWith' => ['real_estate'], 'willingToReceiveDifference' => true, 'willingToPayDifference' => false],
        'details' => ['mileage' => 125000, 'productionYear' => 1396, 'color' => 'سفید', 'ownerEvaluation' => ['engine' => 'سالم', 'body' => 'چند لکه رنگ', 'chassis' => 'ترافیکی جلو'], 'features' => ['inspectionReport' => false, 'thirdPartyInsurance' => true]],
        'offers' => []
    ],
];

        // 2. Use Laravel's Collection helper to find the ad with the matching slug.
        //    This is our "fake database query".
        $ad = collect($mockAds)->firstWhere('slug', $slug);

        // 3. If no ad is found, show a 404 error page.
        abort_if(!$ad, 404, 'Ad not found');

        // 4. If the ad is found, render the Vue component and pass the ad data.
        return Inertia::render('Ads/Show', [
            'ad' => $ad
        ]);
    }
}