<script setup lang="ts">
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import { toPersianDigits } from '@/composables/formatters';

// Mock payment data
const payments = [
    { id: 1, title: 'آگهی فوری - ویلا شمال', amount: 50000, date: '۱۴۰۲/۰۸/۰۵' },
    { id: 2, title: 'آگهی مزایده - پژو ۲۰۷', amount: 100000, date: '۱۴۰۲/۰۸/۰۴' },
    { id: 3, title: 'آگهی فوری - آیفون', amount: 50000, date: '۱۴۰۲/۰۸/۰۱' },
];
</script>

<template>
    <div class="space-y-4">
        <div class="relative items-center justify-between space-y-4 sm:flex">
            <h1 class="w-full text-lg font-bold">آخرین پرداخت ها</h1>
        </div>
        <div class="rounded-lg border-2">
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-[50px]">ردیف</TableHead>
                        <TableHead>عنوان پرداخت</TableHead>
                        <TableHead>مبلغ به ریال</TableHead>
                        <TableHead class="text-left">تاریخ</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="(payment, index) in payments" :key="payment.id">
                        <TableCell>{{ toPersianDigits(index + 1) }}</TableCell>
                        <TableCell class="font-medium">{{ payment.title }}</TableCell>
                        <TableCell>{{ toPersianDigits(payment.amount.toLocaleString('fa-IR')) }}</TableCell>
                        <TableCell class="text-left">{{ toPersianDigits(payment.date) }}</TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </div>
    </div>
</template>
