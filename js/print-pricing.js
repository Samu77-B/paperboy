/**
 * Document printing rates + Ecwid shell product.
 *
 * Ecwid admin setup (one-time):
 * 1. Create product e.g. "Document Printing"
 * 2. Enable "Name Your Price" (required for selectedPrice)
 * 3. Add product options with these exact names:
 *    - Paper size   (dropdown or text)
 *    - Print type   (dropdown or text)
 *    - Pages        (text)
 *    - Job details  (text)
 * 4. Set ecwidProductId below to that product's ID
 *
 * Rates are per page in JMD. Edit freely without touching the UI.
 */
window.PaperboyPrint = {
  ecwidProductId: 0, // set after Ecwid Name Your Price product is created
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
