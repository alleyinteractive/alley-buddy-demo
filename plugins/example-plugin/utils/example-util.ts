/**
 * An example util function that formats a value as currency in USD.
 * @param value - The number to format as currency.
 * @returns The number, formatted as US dollars (USD).
 */
export default function exampleUtil(value: number): string {
  return (new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
  })).format(value);
}
