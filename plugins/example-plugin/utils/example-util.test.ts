import exampleUtil from './example-util';

test('exampleUtil should properly convert values to currency.', () => {
  expect(exampleUtil(1234)).toEqual('$1,234.00');
});
