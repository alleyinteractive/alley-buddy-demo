/**
 * An example util function that formats a value as currency in USD.
 * @param {number} value - The number to format as currency.
 * @returns {string} The number, formatted as US dollars (USD).
 */
export default function exampleUtil(value) {
  return (new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
  })).format(value);
}
