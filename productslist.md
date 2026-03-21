# Ecwid Products (from site code)

**Store ID:** `64309912`  
**Script:** `https://app.ecwid.com/script.js?64309912&data_platform=code&data_date=2021-08-11`

This list is extracted from Ecwid embed code and `xProductBrowser`/single-product widgets in the site. The full catalog lives in Ecwid; only products that are explicitly embedded or set as a category default are listed here.

---

## Single-product embeds (with names)

### Business cards – single-sided  
*(templates/single-sided-business-cards-2/single-sided-business-cards.html)*

| Ecwid Product ID | Product name (from code) |
|------------------|--------------------------|
| 461968788 | BC027 - Business Card Design |
| 462019651 | BC028 - Business Card Design |
| 467046557 | BC030 - Business Card Design |
| 467105152 | BC031 - Business Card Design |
| 467098204 | BC032 - Business Card Design |
| 467105156 | BC033 - Business Card Design |
| 467113488 | BC034 - Business Card Design |
| 467125505 | BC035 - Business Card Design |

### Business cards – double-sided / demi  
*(templates/double-sided-business-cards/, templates/demi-card-design-templates-double-sided/)*

| Ecwid Product ID | Product name (from code) |
|------------------|--------------------------|
| 469159191 | BCD001 / BCD002 - Business Card Design |

### Office stationery packages  
*(templates/office-stationary-templates-2/office-stationary-templates.html)*

| Ecwid Product ID | Product name (from code) |
|------------------|--------------------------|
| 461969032 | OFFICE STATIONERY PACKAGE 001 |
| 461969041 | Office Stationary Template Package 003 |
| 461968048 | Office Stationary Template Package 005 |
| 461969047 | Office Stationary Template Package 006 |
| 461968810 | Office Stationary Template Package 008 |

### Calendars  
*(templates/calenders/calendars.html)*

| Ecwid Product ID | Product name (from code) |
|------------------|--------------------------|
| 595079681 | C001 - Calendar Design |
| 595095095 | C002 - Calendar Design |
| 595125786 | C004 - Calendar Design |
| 595124828 | C005 - Calendar Design |
| 595110209 | C006 - Calendar Design |
| 595119926 | C007 - Calendar Design |
| 595124571 | C008 - Calendar Design |
| 595139297 | C009 - Calendar Design |
| 595141016 | C010 - Calendar Design |
| 595139523 | C011 - Calendar Design |
| 595124832 | C012 - Calendar Design |
| 595125805 | C013 - Calendar Design |
| 595141019 | C014 - Calendar Design |

---

## Category / default product (xProductBrowser)

These are `defaultProductId` values used on category/store pages. The page shows the full Ecwid store with this product/category as default.

| Ecwid Product ID | Page | Purpose |
|------------------|------|---------|
| 390125056 | marketing-products/magazines.html | Magazines – default product |
| 439250583 | marketing-products/flyers.html | Flyers – default product |
| 417365442 | business-products/envelopes.html | Envelopes – default product |
| 414712842 | event-materials/event-tickets.html | Event tickets – default product |
| 434618698 | event-materials/gift-certificates.html | Gift certificates – default product |

### Signs & Banners  
*(signs-banners/*.html – category/store pages with default product)*

| Ecwid Product ID | Page | Purpose |
|------------------|------|---------|
| 742497387 | signs-banners/x-banner-stand.html | X-Banner Stand (defaultSlug=x-banner-stand) |
| 393275752 | signs-banners/step-and-repeat-banners.html | Step and repeat banners – default product |
| 393275752 | signs-banners/mounted-banners.html | Mounted banners – default product |
| 393275752 | signs-banners/indoor-banners.html | Indoor banners – default product |
| 393275752 | signs-banners/feather-banners.html | Feather banners – default product |
| 435960253 | signs-banners/retractable-banners.html | Retractable banners – default product |
| 493514036 | signs-banners/outdoor-banners-stands.html | Outdoor banners & stands – default product |
| 435973287 | signs-banners/hanging-banners.html | Hanging banners – default product |

---

## Unique product IDs (summary)

All Ecwid product IDs referenced in the site (deduplicated):

**Single-product embeds (templates):**
- 461968048, 461968788, 461968810, 461969032, 461969041, 461969047  
- 462019651, 467046557, 467098204, 467105152, 467105156, 467113488, 467125505  
- 469159191  
- 595079681, 595095095, 595110209, 595119926, 595124571, 595124828, 595124832, 595125786, 595125805, 595139297, 595139523, 595141016, 595141019  

**Category/default product (xProductBrowser):**
- 390125056, 414712842, 417365442, 434618698, 439250583  
- 393275752, 435960253, 435973287, 493514036, 742497387  

**Total unique product IDs in code:** 36

> **Note:** The live Ecwid store (store ID 64309912) can have many more products and categories than those linked here. This list only includes products that appear in the site’s HTML (single-product widgets or `defaultProductId` on category pages). To get the full catalog—including products not linked from any page—use the [Ecwid API](https://developers.ecwid.com/api-reference) or export from your Ecwid admin dashboard.

---

## Ecwid embed code (reference)

**Full store (product browser):**
```html
<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?64309912&data_platform=code&data_date=2021-08-11" charset="utf-8"></script>
<script type="text/javascript">Ecwid.init();</script>
```

**Single product widget:**
```html
<div class="ecsp ecsp-SingleProduct-v2 ecsp-Product ec-Product-PRODUCT_ID" itemtype="http://schema.org/Product" data-single-product-id="PRODUCT_ID">
  <div class="ecsp-title" itemprop="name" style="display:none;" content="Product Name"></div>
  <div customprop="addtobag"></div>
</div>
<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?64309912&data_platform=singleproduct_v2" charset="utf-8"></script>
<script type="text/javascript">xProduct()</script>
```

**Product browser with default product/category:**
```javascript
xProductBrowser("categoriesPerRow=3","views=grid(20,3) list(60) table(60)","categoryView=grid","searchView=list","defaultProductId=PRODUCT_ID","id=my-store-64309912");
```
