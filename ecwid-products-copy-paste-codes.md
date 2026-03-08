# Ecwid Copy-Paste Codes for All Products

Use this file when copying the site to a new copy. **Store ID:** `64309912`.

---

## 1. Global Ecwid script (every page that uses Ecwid)

Add once per page (e.g. in footer or before `</body>`):

```html
<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?64309912&data_platform=code&data_date=2021-08-11" charset="utf-8"></script>
<script type="text/javascript">Ecwid.init();</script>
```

---

## 2. Single-product widget (one product per block)

Use this pattern for each product. **Replace `PRODUCT_ID` and `Product Name`** with the values in the tables below.  
Use **one** script block per page (after all product divs), not per product.

**HTML for one product:**

```html
<div class="ecsp ecsp-SingleProduct-v2 ecsp-Product ec-Product-PRODUCT_ID" itemtype="http://schema.org/Product" data-single-product-id="PRODUCT_ID">
  <div class="ecsp-title" itemprop="name" style="display:none;" content="Product Name"></div>
  <div customprop="options"></div>
  <div customprop="addtobag"></div>
</div>
```

**Once per page (after all product divs):**

```html
<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?64309912&data_platform=singleproduct_v2" charset="utf-8"></script>
<script type="text/javascript">xProduct()</script>
```

---

### 2a. Business cards – single-sided

| Product ID | Product name (for `content="..."`) |
|------------|-------------------------------------|
| 461968788 | BC027 - Business Card Design |
| 462019651 | BC028 - Business Card Design |
| 467046557 | BC030 - Business Card Design |
| 467105152 | BC031 - Business Card Design |
| 467098204 | BC032 - Business Card Design |
| 467105156 | BC033 - Business Card Design |
| 467113488 | BC034 - Business Card Design |
| 467125505 | BC035 - Business Card Design |

**Example (BC027):**

```html
<div class="ecsp ecsp-SingleProduct-v2 ecsp-Product ec-Product-461968788" itemtype="http://schema.org/Product" data-single-product-id="461968788">
  <div class="ecsp-title" itemprop="name" style="display:none;" content="BC027 - Business Card Design"></div>
  <div customprop="options"></div>
  <div customprop="addtobag"></div>
</div>
```

---

### 2b. Business cards – double-sided / demi (BCD001/BCD002)

| Product ID | Product name |
|------------|---------------|
| 469159191 | BCD001 / BCD002 - Business Card Design |

**Code:**

```html
<div class="ecsp ecsp-SingleProduct-v2 ecsp-Product ec-Product-469159191" itemtype="http://schema.org/Product" data-single-product-id="469159191">
  <div class="ecsp-title" itemprop="name" style="display:none;" content="BCD001 - Business Card Design"></div>
  <div customprop="addtobag"></div>
</div>
```

---

### 2c. Office stationery packages

| Product ID | Product name |
|------------|---------------|
| 461969032 | OFFICE STATIONERY PACKAGE 001 |
| 461969041 | Office Stationary Template Package 003 |
| 461968048 | Office Stationary Template Package 005 |
| 461969047 | Office Stationary Template Package 006 |
| 461968810 | Office Stationary Template Package 008 |

**Example (Package 001):**

```html
<div class="ecsp ecsp-SingleProduct-v2 ecsp-Product ec-Product-461969032" itemtype="http://schema.org/Product" data-single-product-id="461969032">
  <div class="ecsp-title" itemprop="name" style="display:none;" content="OFFICE STATIONERY PACKAGE 001"></div>
  <div customprop="addtobag"></div>
</div>
```

---

### 2d. Calendars

| Product ID | Product name |
|------------|---------------|
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

**Example (C001) – calendar style with price/offers:**

```html
<div class="ecsp ecsp-SingleProduct-v2 ecsp-SingleProduct-v2-centered ecsp-Product ec-Product-595079681" itemscope="" itemtype="http://schema.org/Product" data-single-product-id="595079681">
  <div class="ecsp-title" itemprop="name" style="display:none;" content="C001 - Calendar Design"></div>
  <div itemtype="http://schema.org/Offer" itemscope="" itemprop="offers">
    <div class="ecsp-productBrowser-price ecsp-price" itemprop="price" content="10">
      <div itemprop="priceCurrency" content="USD"></div>
    </div>
  </div>
  <div customprop="options"></div>
  <div customprop="addtobag"></div>
</div>
```

---

## 3. Product browser (full store / category default)

Use when the page shows the full Ecwid store with a **default product or category**.  
Place `<div id="my-store-64309912"></div>` where the store should appear, then the script.

**Standard (default product by ID):**

```html
<div id="my-store-64309912"></div>
<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?64309912&data_platform=code&data_date=2021-08-11" charset="utf-8"></script>
<script type="text/javascript">
  Ecwid.init();
  xProductBrowser("categoriesPerRow=3","views=grid(20,3) list(60) table(60)","categoryView=grid","searchView=list","defaultProductId=PRODUCT_ID","id=my-store-64309912");
</script>
```

Replace `PRODUCT_ID` with one of the IDs below.

---

### 3a. Category / default product by page

| Page / use case | Product ID | Code snippet |
|-----------------|------------|--------------|
| Magazines | 390125056 | `defaultProductId=390125056` |
| Flyers | 439250583 | `defaultProductId=439250583` |
| Envelopes | 417365442 | `defaultProductId=417365442` |
| Event tickets | 414712842 | `defaultProductId=414712842` |
| Gift certificates | 434618698 | `defaultProductId=434618698` |

**Example (Magazines):**

```html
<div id="my-store-64309912"></div>
<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?64309912&data_platform=code&data_date=2021-08-11" charset="utf-8"></script>
<script type="text/javascript">
  Ecwid.init();
  xProductBrowser("categoriesPerRow=3","views=grid(20,3) list(60) table(60)","categoryView=grid","searchView=list","defaultProductId=390125056","id=my-store-64309912");
</script>
```

---

### 3b. Signs & banners (default product)

| Page | Product ID | Code snippet |
|------|------------|--------------|
| Step and repeat banners | 393275752 | `defaultProductId=393275752` |
| Mounted banners | 393275752 | `defaultProductId=393275752` |
| Indoor banners | 393275752 | `defaultProductId=393275752` |
| Feather banners | 393275752 | `defaultProductId=393275752` |
| Retractable banners | 435960253 | `defaultProductId=435960253` |
| Outdoor banners & stands | 493514036 | `defaultProductId=493514036` |
| Hanging banners | 435973287 | `defaultProductId=435973287` |

**Example (Retractable banners):**

```html
<div id="my-store-64309912"></div>
<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?64309912&data_platform=code&data_date=2021-08-11" charset="utf-8"></script>
<script type="text/javascript">
  Ecwid.init();
  xProductBrowser("categoriesPerRow=3","views=grid(20,3) list(60) table(60)","categoryView=grid","searchView=list","defaultProductId=435960253","id=my-store-64309912");
</script>
```

---

### 3c. X-Banner Stand (product + slug)

This page uses both `defaultProductId` and `defaultSlug`:

```html
<div id="my-store-64309912"></div>
<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?64309912&data_platform=code&data_date=2021-08-11" charset="utf-8"></script>
<script type="text/javascript">
  Ecwid.init();
  xProductBrowser("categoriesPerRow=3","views=grid(20,3) list(60) table(60)","categoryView=grid","searchView=list","defaultProductId=742497387","defaultSlug=x-banner-stand","id=my-store-64309912");
</script>
```

---

## 4. Quick reference – all product IDs

**Single-product embeds:**  
461968048, 461968788, 461968810, 461969032, 461969041, 461969047, 462019651, 467046557, 467098204, 467105152, 467105156, 467113488, 467125505, 469159191, 595079681, 595095095, 595110209, 595119926, 595124571, 595124828, 595124832, 595125786, 595125805, 595139297, 595139523, 595141016, 595141019  

**Category/default (xProductBrowser):**  
390125056, 414712842, 417365442, 434618698, 439250583, 393275752, 435960253, 435973287, 493514036, 742497387  

**Total unique IDs:** 36  

---

## 5. Search widget (optional)

If the page has a search box:

```html
<div id="my-search-64309912"></div>
```

After Ecwid script and `Ecwid.init();`:

```javascript
xSearch("id=my-search-64309912");
```

---

*Generated from site code. Store ID 64309912. For a full catalog export use Ecwid admin or the [Ecwid API](https://developers.ecwid.com/api-reference).*
