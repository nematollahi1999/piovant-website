// resources/js/types/general.ts

export interface City {
  id: number;
  name: string;
  province: string;
}

// A generic type for paginated API responses from Laravel. Very useful!
export interface PaginatedResponse<T> {
  data: T[];
  links: {
    first: string;
    last: string;
    prev: string | null;
    next: string | null;
  };
  meta: {
    current_page: number;
    from: number;
    last_page: number;
    path: string;
    per_page: number;
    to: number;
    total: number;
  };
}