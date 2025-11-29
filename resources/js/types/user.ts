// resources/js/types/user.ts

export interface User {
  id: number;
  name?: string; // Optional, might not be set initially
  phoneNumber: string; // The primary identifier
  avatarUrl?: string;
}

export interface Transaction {
  id: string;
  amount: number;
  description: string; // e.g., "Payment for urgent ad #12345"
  status: 'successful' | 'failed' | 'pending';
  createdAt: string; // ISO date string
}