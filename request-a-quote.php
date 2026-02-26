<?php
$page_title = 'Request a Quote';
$page_description = 'Request a quote for printing services from Paperboy JA. Business cards, banners, flyers, brochures and more in Kingston, Jamaica.';
$current_page = 'quote';
$depth = 0;
$preselect = isset($_GET['product']) ? htmlspecialchars($_GET['product']) : '';
include 'includes/head.php';
include 'includes/nav.php';
?>

  <div class="page-banner" style="background: var(--gradient);">
    <h1>Request a Quote</h1>
    <p>Get a same-day quote for any printing project</p>
  </div>

  <section class="quote-form-section">
    <div class="container">
      <div class="quote-form">
        <div class="form-success" id="quoteSuccess">Thank you! Your quote request has been sent. We'll get back to you within 24 hours.</div>
        <div class="form-error" id="quoteError">Something went wrong. Please try again or contact us directly.</div>

        <form id="quoteForm" method="POST" action="https://b78f9808.sibforms.com/serve/MUIFAE1IBWaY4FVfhm1z3Ay_XXJhho2EHuWmF6yRO6gnLaOfxEYq2GiMqv9-Rj0QnMoXmQJCVwjLHr706V9j7EejepBJqH1xbhIPBmzCCfkQsWkXEP5JIVIcVoweCv2syPjo7NMyycBL9wleyaMyong9kIvDtOvK1qkAhRFw8rrVTyp8YhQVQSb-OYbJRIVeHVm6p_DhTVQCBFIEoA==">
          <div class="form-group">
            <label for="q-product">Product / Service</label>
            <select id="q-product" name="PRODUCT" required>
              <option value="">-- Select a product --</option>
              <optgroup label="Business Products">
                <option value="Business Cards">Business Cards</option>
                <option value="BW/Colour Printing">BW/Colour Printing</option>
                <option value="Scanning">Scanning</option>
                <option value="Booklets">Booklets</option>
                <option value="Labels">Labels</option>
                <option value="Reports">Reports</option>
                <option value="Manuals">Manuals</option>
                <option value="Menus">Menus</option>
                <option value="Press Kits">Press Kits</option>
                <option value="Letterheads">Letterheads</option>
                <option value="Envelopes">Envelopes</option>
                <option value="Architectural Plans">Architectural Plans</option>
                <option value="Receipt Books">Receipt Books</option>
                <option value="Compliment Slips">Compliment Slips</option>
                <option value="Newsletters">Newsletters</option>
                <option value="Note Pads">Note Pads</option>
                <option value="Stationary">Stationary</option>
              </optgroup>
              <optgroup label="Marketing Products">
                <option value="Brochures">Brochures</option>
                <option value="Calendars">Calendars</option>
                <option value="Catalogues">Catalogues</option>
                <option value="Flyers">Flyers</option>
                <option value="Magazines">Magazines</option>
                <option value="Standee Display">Standee Display</option>
                <option value="Easel Backs">Easel Backs</option>
                <option value="Tent Cards">Tent Cards</option>
              </optgroup>
              <optgroup label="Event Materials">
                <option value="Certificates">Certificates</option>
                <option value="Event Tickets">Event Tickets</option>
                <option value="Invitations">Invitations</option>
                <option value="Gift Certificates">Gift Certificates</option>
                <option value="Greeting Cards">Greeting Cards</option>
                <option value="Wristbands">Wristbands</option>
                <option value="Programs">Programs</option>
                <option value="Sporting Bibs">Sporting Bibs</option>
              </optgroup>
              <optgroup label="Signs & Banners">
                <option value="Retractable Banners">Retractable Banners</option>
                <option value="Hanging Banners">Hanging Banners</option>
                <option value="X Banner Stand">X Banner Stand</option>
                <option value="Outdoor Banners">Outdoor Banners</option>
              </optgroup>
              <optgroup label="Photo & Print">
                <option value="Photo Prints">Photo Prints</option>
                <option value="Posters">Posters</option>
                <option value="Canvas Printing">Canvas Printing</option>
              </optgroup>
              <optgroup label="ID Cards">
                <option value="PVC ID Cards">PVC ID Cards</option>
                <option value="Composite ID Cards">Composite ID Cards</option>
                <option value="Loyalty Cards">Loyalty Cards</option>
              </optgroup>
              <option value="Other">Other (describe below)</option>
            </select>
          </div>

          <div class="form-group">
            <label for="q-name">Your Name *</label>
            <input type="text" id="q-name" name="NAME" required placeholder="Full name">
          </div>

          <div class="form-group">
            <label for="q-email">Email *</label>
            <input type="email" id="q-email" name="EMAIL" required placeholder="your@email.com">
          </div>

          <div class="form-group">
            <label for="q-phone">Phone / Mobile</label>
            <input type="tel" id="q-phone" name="MOBILE" placeholder="+1 (876) ...">
          </div>

          <div class="form-group">
            <label for="q-qty">Quantity</label>
            <input type="text" id="q-qty" name="QUANTITY" placeholder="e.g. 500">
          </div>

          <div class="form-group">
            <label for="q-size">Size / Specifications</label>
            <input type="text" id="q-size" name="SPECS" placeholder="e.g. A4, double-sided, full colour">
          </div>

          <div class="form-group">
            <label for="q-message">Additional Details *</label>
            <textarea id="q-message" name="MESSAGE" required placeholder="Tell us about your project..."></textarea>
          </div>

          <input type="text" name="email_address_check" value="" style="display:none">
          <input type="hidden" name="locale" value="en">

          <button type="submit" class="btn btn-blue" style="width:100%;">Send Quote Request</button>
        </form>
      </div>
    </div>
  </section>

  <script>
    var pre = '<?= $preselect ?>';
    if (pre) {
      var sel = document.getElementById('q-product');
      if (sel) {
        for (var i = 0; i < sel.options.length; i++) {
          if (sel.options[i].value.toLowerCase() === pre.toLowerCase()) {
            sel.selectedIndex = i;
            break;
          }
        }
      }
    }
  </script>

  <script>
    window.REQUIRED_CODE_ERROR_MESSAGE = 'Please choose a country code';
    window.LOCALE = 'en';
    window.EMAIL_INVALID_MESSAGE = "The information provided is invalid.";
    window.REQUIRED_ERROR_MESSAGE = "This field cannot be left blank.";
    var AUTOHIDE = Boolean(0);
  </script>
  <script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>

<?php include 'includes/footer.php'; ?>
