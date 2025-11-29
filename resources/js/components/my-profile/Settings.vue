<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { UploadCloud } from 'lucide-vue-next';
import { reactive, ref } from 'vue';

// Mock data for user settings
const userSettings = reactive({
    name: 'کاربر معاوضه',
    email: 'user@example.com',
    invitationCode: 'M-1A2B3C',
});

const nationalIdFile = ref<File | null>(null);
const birthCertificateFile = ref<File | null>(null);

const handleFileChange = (event: Event, type: 'nationalId' | 'birthCertificate') => {
    const target = event.target as HTMLInputElement;
    if (target.files && target.files[0]) {
        if (type === 'nationalId') {
            nationalIdFile.value = target.files[0];
        } else {
            birthCertificateFile.value = target.files[0];
        }
    }
};
</script>

<template>
    <!-- 
      MODIFIED: 
      - `grid-cols-1` for mobile (default).
      - `md:grid-cols-3` for medium screens and up.
    -->
    <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-3">
        <!-- Personal Information Card -->
        <!-- MODIFIED: `md:col-span-2` to take up 2/3 of the width on desktop -->
        <Card class="px-2 py-6 md:col-span-2">
            <CardHeader>
                <CardTitle>اطلاعات شخصی</CardTitle>
                <CardDescription>اطلاعات حساب کاربری خود را ویرایش کنید.</CardDescription>
            </CardHeader>
            <CardContent class="space-y-4">
                <div class="space-y-1">
                    <Label for="name">نام و نام خانوادگی</Label>
                    <Input
                        id="name"
                        v-model="userSettings.name"
                        class="w-full cursor-pointer border-1 border-gray-300 text-start hover:bg-gray-50 focus:bg-gray-50 focus:outline-none focus-visible:ring-0 focus-visible:ring-offset-0"
                    />
                </div>
                <div class="space-y-1">
                    <Label for="email">ایمیل</Label>
                    <Input
                        id="email"
                        type="email"
                        v-model="userSettings.email"
                        class="w-full cursor-pointer border-1 border-gray-300 text-start hover:bg-gray-50 focus:bg-gray-50 focus:outline-none focus-visible:ring-0 focus-visible:ring-offset-0"
                    />
                </div>
                <Button class="cursor-pointer rounded-sm bg-[#FF4A4A] hover:bg-red-500">ذخیره تغییرات</Button>
            </CardContent>
        </Card>

        <!-- Invitation Code Card -->
        <!-- MODIFIED: `md:col-span-1` to take up 1/3 of the width on desktop -->
        <Card class="px-2 py-6 md:col-span-1">
            <CardHeader>
                <CardTitle>کد دعوت</CardTitle>
                <CardDescription>با اشتراک گذاری این کد، از مزایای معرفی دوستان بهره‌مند شوید.</CardDescription>
            </CardHeader>
            <CardContent class="flex items-center gap-4">
                <Input
                    :value="userSettings.invitationCode"
                    readonly
                    class="w-full cursor-pointer border-1 border-gray-300 text-center tracking-widest hover:bg-gray-50 focus:border-none focus:bg-gray-200 focus:outline-none focus-visible:ring-0 focus-visible:ring-offset-0"
                />
                <Button variant="outline">کپی کردن</Button>
            </CardContent>
        </Card>

        <!-- Identity Verification Card -->
        <!-- MODIFIED: `md:col-span-3` to take up the full width on the next row -->
        <Card class="px-2 py-6 md:col-span-3">
            <CardHeader>
                <CardTitle>احراز هویت</CardTitle>
                <CardDescription>برای افزایش امنیت حساب و اعتماد سایر کاربران، هویت خود را تایید کنید.</CardDescription>
            </CardHeader>
            <CardContent class="grid gap-6 md:grid-cols-2">
                <!-- National ID Uploader -->
                <div class="space-y-2">
                    <Label for="nationalId">تصویر کارت ملی</Label>
                    <div
                        @click="($refs.nationalIdInput as HTMLInputElement).click()"
                        class="flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed p-8 text-center hover:border-primary"
                    >
                        <UploadCloud class="h-10 w-10 text-muted-foreground" />
                        <p v-if="!nationalIdFile" class="mt-2 text-sm text-muted-foreground">بارگذاری فایل</p>
                        <p v-else class="mt-2 text-sm font-medium text-green-600">{{ nationalIdFile.name }}</p>
                    </div>
                    <input ref="nationalIdInput" id="nationalId" type="file" class="hidden" @change="handleFileChange($event, 'nationalId')" />
                </div>
                <!-- Birth Certificate Uploader -->
                <div class="space-y-2">
                    <Label for="birthCertificate">تصویر شناسنامه</Label>
                    <div
                        @click="($refs.birthCertInput as HTMLInputElement).click()"
                        class="flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed p-8 text-center hover:border-primary"
                    >
                        <UploadCloud class="h-10 w-10 text-muted-foreground" />
                        <p v-if="!birthCertificateFile" class="mt-2 text-sm text-muted-foreground">بارگذاری فایل</p>
                        <p v-else class="mt-2 text-sm font-medium text-green-600">{{ birthCertificateFile.name }}</p>
                    </div>
                    <input
                        ref="birthCertInput"
                        id="birthCertificate"
                        type="file"
                        class="hidden"
                        @change="handleFileChange($event, 'birthCertificate')"
                    />
                </div>
                <div class="md:col-span-2">
                    <Button class="w-full cursor-pointer rounded-sm bg-[#FF4A4A] hover:bg-red-500">ارسال مدارک</Button>
                </div>
            </CardContent>
        </Card>
    </div>
</template>
