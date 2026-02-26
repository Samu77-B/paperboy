<?php
$page_title = 'Professional Printing Services in Kingston, Jamaica';
$page_description = "Kingston's premier printing service. Get high-quality digital printing for business cards, banners, flyers, brochures, and more. Fast turnaround, competitive prices, and professional service in Kingston, Jamaica.";
$page_url = '';
$current_page = 'home';
$depth = 0;

$schema_json = '{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "@id": "https://paperboyja.com/#business",
  "name": "Paperboy JA",
  "alternateName": "Paperboy Jamaica",
  "image": ["https://paperboyja.com/images/PBlogoColour.png"],
  "description": "Professional printing services in Kingston, Jamaica.",
  "address": {"@type": "PostalAddress", "streetAddress": "Shop #6 Winchester Business Centre, 15 Hope Road", "addressLocality": "Kingston", "addressRegion": "St. Andrew", "postalCode": "JMAAW15", "addressCountry": "JM"},
  "geo": {"@type": "GeoCoordinates", "latitude": 18.017874, "longitude": -76.809904},
  "url": "https://paperboyja.com",
  "telephone": "+1-876-620-7085",
  "priceRange": "$$",
  "aggregateRating": {"@type": "AggregateRating", "ratingValue": "4.8", "reviewCount": "184", "bestRating": "5", "worstRating": "1"},
  "openingHoursSpecification": [{"@type": "OpeningHoursSpecification", "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"], "opens": "09:00", "closes": "17:00"}],
  "sameAs": ["https://www.facebook.com/paperboyja","https://www.instagram.com/paperboyja","https://www.linkedin.com/company/paperboyja"],
  "foundingDate": "2004"
}';

include 'includes/head.php';
include 'includes/nav.php';
?>

  <!-- Hero Banner -->
  <section class="hero-banner" style="background-image: url('images/frontpagebanner.jpg');">
    <div class="anniversary-badge">
      <img src="images/20years.png" alt="20th Anniversary">
    </div>
    <div class="hero-banner-text">
      <h1>20 Years of Excellence</h1>
    </div>
  </section>

  <!-- Fireworks Script -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var banner = document.querySelector('.hero-banner');
    if (!banner) return;
    var colors = ['#FDB300','#00aeec','#667eea','#FF6B6B','#FFD93D','#6BCB77','#FFFFFF'];
    function createFirework(x, y) {
      var container = document.createElement('div');
      container.className = 'firework';
      container.style.left = x + 'px';
      container.style.top = y + 'px';
      var color = colors[Math.floor(Math.random() * colors.length)];
      for (var i = 0; i < 40; i++) {
        var p = document.createElement('div');
        p.className = 'firework-particle';
        p.style.backgroundColor = color;
        p.style.color = color;
        var angle = (Math.PI * 2 * i) / 40;
        var vel = 60 + Math.random() * 60;
        p.style.setProperty('--tx', 'translate(' + (Math.cos(angle)*vel) + 'px,' + (Math.sin(angle)*vel) + 'px)');
        container.appendChild(p);
      }
      banner.appendChild(container);
      setTimeout(function() { container.remove(); }, 1500);
    }
    function launch() {
      var r = banner.getBoundingClientRect();
      createFirework(30 + Math.random()*(r.width-60), 30 + Math.random()*(r.height-60));
    }
    var iv = setInterval(launch, 2000);
    setTimeout(function() { launch(); setTimeout(launch, 400); setTimeout(launch, 800); }, 1000);
    setTimeout(function() { clearInterval(iv); }, 120000);
  });
  </script>

  <!-- Search Section -->
  <section class="search-section">
    <div class="container">
      <h2>What would you like to search for?</h2>
      <div class="search-bar-wrap">
        <div id="my-search-64309912-inline" role="search" aria-label="Search products"></div>
      </div>
    </div>
  </section>

  <!-- Google Reviews -->
  <section class="reviews-section">
    <div class="container">
      <div class="reviews-header">
        <h2>What Our Customers Say</h2>
        <div class="rating-summary">
          <span class="rating-number" id="rating-number">4.8</span>
          <span class="rating-stars" id="rating-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
          <span class="rating-count" id="rating-count">184 reviews</span>
        </div>
      </div>
      <div id="reviews-carousel" class="reviews-carousel"></div>
      <div class="review-buttons">
        <a href="https://share.google/BumzdEyPOBPIYIgfg" target="_blank" rel="noopener" class="review-btn primary">Leave a Review</a>
        <a href="https://maps.app.goo.gl/8pd9NMSEfVPWUBdZ8" target="_blank" rel="noopener" class="review-btn secondary">View All Reviews</a>
      </div>
    </div>
  </section>

  <!-- Reviews Script -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script>
  (function() {
    var FALLBACK = {
      rating: 4.8, totalReviews: 184,
      reviews: [
        {author_name:'John Smith',rating:5,text:'Excellent service and quality! The team at Paperboy was professional and delivered exactly what we needed.',date:'2 weeks ago'},
        {author_name:'Sarah Johnson',rating:5,text:'Very impressed with the print quality and fast turnaround time. Will definitely use their services again!',date:'1 month ago'},
        {author_name:'Michael Brown',rating:5,text:'Great experience working with Paperboy. Their attention to detail and customer service is outstanding.',date:'2 months ago'}
      ]
    };
    function stars(r) { var s=''; for(var i=0;i<Math.floor(r);i++) s+='\u2605'; return s; }
    function card(r) {
      var d = document.createElement('div');
      d.className = 'review-card';
      var name = r.author_name||'User';
      var img = r.profile_photo_url || 'https://ui-avatars.com/api/?name='+encodeURIComponent(name)+'&size=40&background=667eea&color=fff&bold=true';
      d.innerHTML = '<div class="review-author"><img src="'+img+'" alt="'+name+'" onerror="this.src=\'https://ui-avatars.com/api/?name='+encodeURIComponent(name)+'&size=40&background=667eea&color=fff\'"><div><div class="author-name">'+name+'</div><div class="review-stars">'+stars(r.rating)+'</div></div></div><div class="review-text">'+(r.text||'')+'</div>'+(r.date?'<div class="review-date">'+r.date+'</div>':'');
      return d;
    }
    function render(reviews) {
      var c = document.getElementById('reviews-carousel');
      if(!c) return;
      c.innerHTML = '';
      reviews.forEach(function(r) { c.appendChild(card(r)); });
      if(typeof jQuery!=='undefined' && jQuery.fn.slick) {
        jQuery('#reviews-carousel').slick({dots:true,infinite:true,speed:500,slidesToShow:3,slidesToScroll:1,autoplay:true,autoplaySpeed:5000,pauseOnHover:true,responsive:[{breakpoint:991,settings:{slidesToShow:2}},{breakpoint:767,settings:{slidesToShow:1}}]});
      }
    }
    async function init() {
      try {
        var resp = await fetch('google-reviews-proxy.php');
        if(!resp.ok) throw new Error('HTTP '+resp.status);
        var data = await resp.json();
        var rn = document.getElementById('rating-number');
        var rc = document.getElementById('rating-count');
        if(rn) rn.textContent = (parseFloat(data.rating)||4.8).toFixed(1);
        if(rc) rc.textContent = (parseInt(data.user_ratings_total)||184)+' reviews';
        render(data.reviews && data.reviews.length ? data.reviews : FALLBACK.reviews);
      } catch(e) { render(FALLBACK.reviews); }
    }
    if(document.readyState==='loading') document.addEventListener('DOMContentLoaded',init); else init();
  })();
  </script>

  <!-- Product Slider -->
  <section class="cards-section">
    <div class="container">
      <div class="cards-grid">
        <div class="product-card">
          <div class="product-card-img-wrap"><img src="images/businessCard.jpg" alt="Business Cards" class="product-card-img"></div>
          <div class="product-card-body">
            <h3>Business Cards</h3>
            <p>Beautiful business cards to make you and your business shine...</p>
            <a href="business-products/business-cards.php" class="link-dark">Find out more</a>
          </div>
        </div>
        <div class="product-card">
          <div class="product-card-img-wrap"><img src="images/MOSQUITOM.jpg" alt="Signs &amp; Banners" class="product-card-img"></div>
          <div class="product-card-body">
            <h3>Signs &amp; Banners</h3>
            <p>Banners, indoor &amp; outdoor banner stands, retractable banners, step &amp; repeat banners...</p>
            <a href="signs-banners/index.php" class="link-dark">Find out more</a>
          </div>
        </div>
        <div class="product-card">
          <div class="product-card-img-wrap"><img src="images/PM1.jpg" alt="Photo Prints" class="product-card-img"></div>
          <div class="product-card-body">
            <h3>Photo Prints</h3>
            <p>A beautiful way to preserve and share memories. Make your photographs into album inserts or wall art...</p>
            <a href="photo-printing/photo-prints.php" class="link-dark">Find out more</a>
          </div>
        </div>
        <div class="product-card">
          <div class="product-card-img-wrap"><img src="images/ID_CARD_3.jpg" alt="ID Cards" class="product-card-img"></div>
          <div class="product-card-body">
            <h3>ID Cards</h3>
            <p>Whether you're running a business or presiding over a school, ID cards have become crucial...</p>
            <a href="identification-cards/index.php" class="link-dark">Find out more</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Category Cards -->
  <section class="cards-section bg-light">
    <div class="container">
      <div class="cards-grid cards-grid-3">
        <div class="product-card">
          <div class="product-card-img-wrap"><img src="images/7e542e33-c520-4406-beac-b80ccf6b8c94.jpg" alt="Business Products" class="product-card-img"></div>
          <div class="product-card-body">
            <h3>Business Products</h3>
            <p>Binding, laminating, scanning, business cards, labels, reports, manuals, menus, press kits...</p>
            <a href="business-products/index.php" class="link-dark">Find out more</a>
          </div>
        </div>
        <div class="product-card">
          <div class="product-card-img-wrap"><img src="images/marketing.jpg" alt="Marketing Products" class="product-card-img"></div>
          <div class="product-card-body">
            <h3>Marketing Products</h3>
            <p>Brochures, catalogues, flyers, calendars, magazines, menus, invitations...</p>
            <a href="marketing-products/index.php" class="link-dark">Find out more</a>
          </div>
        </div>
        <div class="product-card">
          <div class="product-card-img-wrap"><img src="images/booklets.jpg" alt="Events Materials" class="product-card-img"></div>
          <div class="product-card-body">
            <h3>Events Materials</h3>
            <p>Certificates, event tickets, invitations, gift certificates, greeting cards, programs...</p>
            <a href="event-materials/index.php" class="link-dark">Find out more</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="feature-section">
    <div class="container">
      <div class="feature-grid">
        <div>
          <h2>More Than Just<br>A Print Shop</h2>
          <p>We are one of Jamaica's leading providers of print &amp; graphic design services, offering professional solutions to businesses and individuals across the island, and beyond. Our superbly trained team goes the extra mile to listen to our customers' needs and will subsequently offer tailored solutions to meet those needs, setting us apart from the rest.</p>
          <p><strong>This is the Paperboy JA promise.</strong></p>
        </div>
        <div>
          <div class="feature-item">
            <img src="images/Leading-Icon.png" alt="Leading printing company">
            <p>To be the leading printing and graphic design company in Jamaica by consistently providing our customers with high quality printing combined with exceptional customer service.</p>
          </div>
          <div class="feature-item">
            <img src="images/Design-icon.png" alt="Design team">
            <p>Paperboy JA will be the design and print company of choice in the industry. Our highly trained team provides our customers with creative solutions that exceed expectations.</p>
          </div>
          <div class="feature-item">
            <img src="images/Service-Icon.png" alt="Adaptability">
            <p><strong>Adaptability:</strong> We believe that our adaptability will carry our company into the future.</p>
          </div>
          <div class="feature-item">
            <a href="templates/templates.php"><img src="images/designTemplate2.png" alt="Design Templates"></a>
            <p><strong>Design Templates:</strong> Paperboy JA have FREE templates available for you to download and use.</p>
          </div>
          <div class="feature-item">
            <a href="request-a-quote.php"><img src="images/requestQuote2.png" alt="Request a Quote"></a>
            <p><strong>Request a Quote:</strong> Same day quoting on any job you have. If you don't see it online just send us a 'Request a Quote'.</p>
          </div>
          <div class="feature-item">
            <a href="large-format.php"><img src="images/SizeIcon.png" alt="Large Format"></a>
            <p><strong>Large format:</strong> Enhance your large format print displays with our supplies.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>
