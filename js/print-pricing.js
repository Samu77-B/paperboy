/**
 * Document printing rates + PaySynk product.
 *
 * PaySynk admin setup (one-time):
 * 1. Create a Document Printing product
 * 2. Set paysynkProduct to that product's slug
 *
 * Rates are per page in JMD. Edit freely without touching the UI.
 */
window.PaperboyPrint = {
  paysynkProduct: 'colour-bw-printing',
  currency: 'J$',
  studentDiscount: 0.15,
  sizes: ['US Letter', 'A4', 'Legal', 'Tabloid'],
  rates: {
    'US Letter': { bw: 10, colour: 40 },
    'A4': { bw: 10, colour: 40 },
    'Legal': { bw: 12, colour: 45 },
    'Tabloid': { bw: 20, colour: 70 }
  }
};
