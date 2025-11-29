// resources/js/lib/formatters.ts

/**
 * Converts any English digits in a string to their Persian counterparts.
 * @param value The string or number to convert.
 * @returns A string with all digits converted to Persian.
 */
export function toPersianDigits(value: string | number): string {
  if (value === null || value === undefined) {
    return '';
  }
  
  const strValue = String(value);
  const persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
  
  return strValue.replace(/[0-9]/g, (digit) => {
    return persianDigits[parseInt(digit)];
  });
}

/**
 * NEW: Truncates a string to a specified length and adds an ellipsis.
 * @param text The string to truncate.
 * @param limit The character limit. Defaults to 30.
 * @returns The truncated string.
 */
export function truncateText(text: string, limit = 26): string {
  if (text.length > limit) {
    return text.slice(0, limit) + '...';
  }
  return text;
}

/**
 * NEW: Converts an ISO date string into a relative "time ago" format in Persian.
 * @param dateString The ISO date string to convert.
 * @returns A formatted string like "۲ ساعت پیش".
 */
export function formatTimeAgo(dateString: string): string {
  try {
    const hoursAgo = Math.floor((new Date().getTime() - new Date(dateString).getTime()) / 3600000);
    let timeString = '';
    
    if (hoursAgo < 1) timeString = 'لحظاتی پیش';
    else if (hoursAgo < 24) timeString = `${hoursAgo} ساعت پیش`;
    else timeString = `${Math.floor(hoursAgo / 24)} روز پیش`;
    
    return toPersianDigits(timeString);
  } catch (error) {
    console.error("Invalid date string for formatTimeAgo:", dateString);
    return '';
  }
}