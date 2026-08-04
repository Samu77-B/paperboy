<?php
/**
 * Shared BW/colour print order builder.
 * Set $print_is_student = true on student pages for the 15% discount.
 */
$print_is_student = !empty($print_is_student);
$print_root_id = $print_is_student ? 'printConfiguratorStudent' : 'printConfigurator';
$print_sizes = $print_sizes ?? ['US Letter', 'A4', 'Legal', 'Tabloid'];
?>
<div
  id="<?= htmlspecialchars($print_root_id) ?>"
  class="print-configurator"
  data-student="<?= $print_is_student ? 'true' : 'false' ?>"
>
  <div class="print-config-intro">
    <h2 class="print-config-title">Build your print order</h2>
    <p class="print-config-lead">
      Add as many lines as you need — mix paper sizes and black &amp; white or colour in one order.
      <?php if ($print_is_student): ?>
      Student Club pricing includes <strong>15% off</strong>. Use your member number at checkout.
      <?php endif; ?>
    </p>
  </div>

  <form class="print-line-form" novalidate>
    <div class="print-line-fields">
      <div class="print-field">
        <label for="<?= $print_root_id ?>-pages">Pages</label>
        <input
          type="number"
          id="<?= $print_root_id ?>-pages"
          name="pages"
          min="1"
          max="9999"
          step="1"
          value="1"
          required
          inputmode="numeric"
        >
      </div>
      <div class="print-field">
        <label for="<?= $print_root_id ?>-size">Paper size</label>
        <select id="<?= $print_root_id ?>-size" name="size" required>
          <?php foreach ($print_sizes as $size): ?>
          <option value="<?= htmlspecialchars($size) ?>"><?= htmlspecialchars($size) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="print-field print-field-type">
        <span class="print-field-label" id="<?= $print_root_id ?>-type-label">Print type</span>
        <div class="print-type-toggle" role="group" aria-labelledby="<?= $print_root_id ?>-type-label">
          <label class="print-type-option">
            <input type="radio" name="printType" value="bw" checked>
            <span>Black &amp; white</span>
          </label>
          <label class="print-type-option">
            <input type="radio" name="printType" value="colour">
            <span>Colour</span>
          </label>
        </div>
      </div>
    </div>
    <div class="print-line-actions">
      <p class="print-line-preview" aria-live="polite"></p>
      <button type="submit" class="btn btn-blue print-add-line">Add to order</button>
    </div>
  </form>

  <div class="print-order">
    <h3 class="print-order-heading">Your order</h3>
    <p class="print-order-empty">No lines yet — add pages, size, and print type above.</p>
    <ul class="print-order-list" aria-live="polite"></ul>
    <div class="print-order-summary" hidden>
      <div class="print-totals">
        <div class="print-total-row print-subtotal-row" hidden>
          <span>Subtotal</span>
          <span class="print-subtotal-value"></span>
        </div>
        <div class="print-total-row print-discount-row" hidden>
          <span>Student Club (15% off)</span>
          <span class="print-discount-value"></span>
        </div>
        <div class="print-total-row print-grand-row">
          <span>Total</span>
          <span class="print-total-value"></span>
        </div>
      </div>
      <button type="button" class="btn btn-blue print-add-cart">Add order to cart</button>
      <p class="print-cart-status" aria-live="polite"></p>
    </div>
  </div>
</div>
