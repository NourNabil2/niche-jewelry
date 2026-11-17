/* ==========================================================================
   NICH JEWELRY — GLOBAL HEADER, CART DRAWER, SEARCH & FOOTER
   ========================================================================== */

(function () {
  function currentFile() {
    const path = window.location.pathname;
    const parts = path.split('/');
    return parts[parts.length - 1] || 'index.html';
  }

  function showToast(msg, icon = '✦') {
    let container = document.getElementById('epToastContainer');
    if (!container) {
      container = document.createElement('div');
      container.id = 'epToastContainer';
      container.className = 'toast-container';
      document.body.appendChild(container);
    }
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = `<span style="color:#c59b3f;">${icon}</span><span>${msg}</span>`;
    container.appendChild(toast);
    setTimeout(() => {
      toast.style.opacity = '0';
      toast.style.transform = 'translateY(10px)';
      toast.style.transition = 'all 0.25s ease';
      setTimeout(() => toast.remove(), 260);
    }, 2800);
  }

  function renderHeaderFooter() {
    const activePage = currentFile();
    const isCustomizer = activePage === 'customizer.html';

    // Top Header Markup
    const headerHTML = `
      <div class="announcement-bar">
        <span>Complimentary Insured Delivery Over $150</span>
        <span class="announcement-dot">&bull;</span>
        <span>Use Code <strong id="copyPromoBtn" title="Click to copy NICH15">NICH15</strong> for 15% Off</span>
      </div>
      <header class="site-header" id="siteHeader">
        <div class="container header-inner">
          <div class="header-left" style="display:flex; align-items:center; gap:12px;">
            <button class="icon-btn mobile-menu-btn" id="openMobileMenu" aria-label="Menu">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            </button>
            <nav class="header-nav">
              <a href="collections.html" class="nav-link ${activePage === 'collections.html' ? 'active' : ''}">Shop All</a>
              <a href="customizer.html" class="nav-link studio-pill ${activePage === 'customizer.html' ? 'active' : ''}">3D Studio</a>
              <a href="collections.html?cat=charms" class="nav-link">Charms</a>
              <a href="about.html" class="nav-link ${activePage === 'about.html' ? 'active' : ''}">Our Story</a>
            </nav>
          </div>

          <a href="index.html" class="brand-logo" aria-label="Niche Jewelry">
            <img src="assets/images/niche-logo-dark.png" alt="Niche Jewelry" class="brand-logo-img">
          </a>

          <div class="header-actions">
            <button class="icon-btn" id="openSearchBtn" title="Search Jewelry" aria-label="Search">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            </button>
            <a href="account.html" class="icon-btn nav-account-btn" title="My Account & Orders" aria-label="Account">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              <span id="accountDot" style="position:absolute; bottom:4px; right:4px; width:6px; height:6px; border-radius:50%; background:#c59b3f; display:none;"></span>
            </a>
            <a href="wishlist.html" class="icon-btn" title="Wishlist & Saved 3D Designs" aria-label="Wishlist">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
              <span class="badge-count hidden" id="navWishlistCount">0</span>
            </a>
            <button class="icon-btn" id="openCartDrawerBtn" title="Shopping Bag" aria-label="Bag">
              <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
              <span class="badge-count gold hidden" id="navCartCount">0</span>
            </button>
          </div>
        </div>
      </header>

      <!-- Mobile Navigation Drawer -->
      <div class="mobile-nav-drawer" id="mobileNavDrawer">
        <div class="mobile-nav-panel">
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
            <a href="index.html" style="display:inline-block;"><img src="assets/images/niche-logo-dark.png" alt="Niche Jewelry" style="height:34px; width:auto; display:block;"></a>
            <button class="icon-btn" id="closeMobileMenu">&times;</button>
          </div>
          <a href="index.html" class="mobile-nav-link">Home</a>
          <a href="collections.html" class="mobile-nav-link">Shop All</a>
          <a href="customizer.html" class="mobile-nav-link" style="color:#8b661d;">3D Glider Studio ✦</a>
          <a href="collections.html?cat=bangles" class="mobile-nav-link">Glider Bangles</a>
          <a href="collections.html?cat=charms" class="mobile-nav-link">Charms</a>
          <a href="wishlist.html" class="mobile-nav-link">Wishlist & Saved 3D</a>
          <a href="account.html" class="mobile-nav-link">My Account & Orders</a>
          <a href="about.html" class="mobile-nav-link">Our Story & Sizing</a>
        </div>
      </div>

      <!-- Search Overlay Modal -->
      <div class="search-overlay" id="searchOverlay">
        <div class="search-modal">
          <div class="search-input-row">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#737373" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" id="globalSearchInput" placeholder="Search 14K bangles, bee charm, pavé initials, rings..." autocomplete="off">
            <button class="icon-btn" id="closeSearchBtn" style="font-size:22px;">&times;</button>
          </div>
          <div class="search-results" id="globalSearchResults"></div>
        </div>
      </div>

      <!-- Global Slide-Out Cart Drawer -->
      <div class="drawer-backdrop" id="cartBackdrop"></div>
      <aside class="cart-drawer" id="cartDrawer" aria-label="Shopping Bag">
        <div class="cart-drawer-header">
          <h2 class="cart-drawer-title">Your Jewelry Bag (<span id="drawerCartCount">0</span>)</h2>
          <button class="icon-btn" id="closeCartDrawerBtn" style="font-size:24px; line-height:1;">&times;</button>
        </div>
        <div class="shipping-progress-box" id="shippingProgressBox"></div>
        <div class="cart-drawer-items" id="cartDrawerItems"></div>
        <div class="cart-drawer-footer" id="cartDrawerFooter">
          <div class="promo-inline">
            <input type="text" id="drawerPromoInput" placeholder="Promo Code (e.g. NICH15)">
            <button class="btn btn-outline btn-sm" id="drawerApplyPromoBtn">Apply</button>
          </div>
          <div id="drawerPromoActive" style="display:none; font-size:11px; color:#2b6cb0; margin-bottom:10px; justify-content:space-between; align-items:center;"></div>
          <div style="display:flex; justify-content:space-between; font-size:13px; margin-bottom:4px;">
            <span>Subtotal</span>
            <strong id="drawerSubtotal">$0.00</strong>
          </div>
          <div id="drawerDiscountRow" style="display:none; justify-content:space-between; font-size:12px; color:#2f855a; margin-bottom:6px;">
            <span>Promo Discount</span>
            <span id="drawerDiscountAmt">-$0.00</span>
          </div>
          <div style="display:flex; justify-content:space-between; font-size:16px; font-weight:600; padding-top:8px; border-top:1px solid #e6e3dc; margin-bottom:14px;">
            <span>Estimated Total</span>
            <span class="serif" style="font-size:22px;" id="drawerTotal">$0.00</span>
          </div>
          <a href="checkout.html" class="btn btn-primary" style="width:100%;" id="drawerCheckoutBtn">
            Proceed to Checkout &rarr;
          </a>
        </div>
      </aside>
    `;

    // Mount Header
    const headerMount = document.getElementById('ep-header-mount');
    if (headerMount) {
      headerMount.innerHTML = headerHTML;
    }

    // Footer Markup (skip on full-screen 3D studio so viewport remains 100vh clean)
    const footerMount = document.getElementById('ep-footer-mount');
    if (footerMount && !isCustomizer) {
      footerMount.innerHTML = `
        <footer class="site-footer">
          <div class="container">
            <!-- Atelier Trust Strip -->
            <div class="footer-trust-strip">
              <div class="trust-pill"><span class="trust-pill-icon">✦</span> Solid 14K Recycled Gold</div>
              <div class="trust-pill"><span class="trust-pill-icon">✦</span> Patented Dual-Track Glider™</div>
              <div class="trust-pill"><span class="trust-pill-icon">✦</span> Complimentary Insured Shipping</div>
              <div class="trust-pill"><span class="trust-pill-icon">✦</span> Lifetime Atelier Warranty</div>
            </div>

            <div class="footer-grid">
              <div>
                <a href="index.html" style="display:inline-block; margin-bottom:14px;"><img src="assets/images/niche-logo-white.png" alt="Niche Jewelry" style="height:38px; width:auto; display:block;"></a>
                <p class="footer-desc">
                  Thoughtfully engineered fine jewelry crafted in solid 14K recycled gold and 925 sterling silver. Home of the patented Dual-Sided Glider Charm Bangle™.
                </p>
                <div style="margin-top:18px; display:flex; gap:10px;">
                  <a href="customizer.html" class="btn btn-gold btn-sm">Launch 3D Studio ✦</a>
                </div>
              </div>
              <div>
                <div class="footer-col-title">Shop Jewelry</div>
                <ul class="footer-links">
                  <li><a href="collections.html?cat=bangles">Glider Bangles</a></li>
                  <li><a href="collections.html?cat=charms">Cutout Glider Charms</a></li>
                  <li><a href="collections.html?cat=necklaces">Medallion Necklaces</a></li>
                  <li><a href="collections.html?cat=earrings">Pavé Huggie Hoops</a></li>
                  <li><a href="collections.html?cat=rings">Stacking Rings</a></li>
                </ul>
              </div>
              <div>
                <div class="footer-col-title">Atelier & Care</div>
                <ul class="footer-links">
                  <li><a href="about.html">Our Story & Ethics</a></li>
                  <li><a href="about.html#sizing">Wrist Size Guide</a></li>
                  <li><a href="about.html#care">14K Gold & Silver Care</a></li>
                  <li><a href="wishlist.html">Saved 3D Designs</a></li>
                  <li><a href="account.html">Track Your Order</a></li>
                </ul>
              </div>
              <div>
                <div class="footer-col-title">Join the Collector List</div>
                <p style="font-size:12px; color:#a9a295;">Receive early access to limited enamel charms & enjoy 15% off with code <strong style="color:#c59b3f;">NICH15</strong>.</p>
                <form class="footer-newsletter-capsule" id="footerNewsletterForm">
                  <input type="email" id="footerNewsletterEmail" placeholder="Enter your email" required aria-label="Email address for collector list">
                  <button type="submit" class="newsletter-submit-btn" aria-label="Join newsletter">
                    <span>Join</span>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14m-7-7l7 7-7 7"/></svg>
                  </button>
                </form>
              </div>
            </div>
            <div class="footer-bottom">
              <span class="footer-copy">&copy; 2026 Niche Jewelry Atelier. Handcrafted Excellence.</span>
              <div class="footer-payment-tags">
                <span class="pay-tag">Solid 14K Gold</span>
                <span class="pay-tag">925 Silver</span>
                <span class="pay-tag">Insured Delivery</span>
                <span class="pay-tag">Secure Checkout</span>
              </div>
            </div>
          </div>
        </footer>
      `;
    }

    bindGlobalEvents();
    syncBadgesAndDrawer();
  }

  function bindGlobalEvents() {
    // Promo copy click
    const copyBtn = document.getElementById('copyPromoBtn');
    if (copyBtn) {
      copyBtn.addEventListener('click', () => {
        navigator.clipboard?.writeText('NICH15');
        showToast('Promo code NICH15 copied to clipboard!');
      });
    }

    // Sticky scroll effect
    window.addEventListener('scroll', () => {
      const hdr = document.getElementById('siteHeader');
      if (hdr) hdr.classList.toggle('scrolled', window.scrollY > 20);
    });

    // Mobile nav drawer
    const mobileDrawer = document.getElementById('mobileNavDrawer');
    document.getElementById('openMobileMenu')?.addEventListener('click', () => mobileDrawer?.classList.add('open'));
    document.getElementById('closeMobileMenu')?.addEventListener('click', () => mobileDrawer?.classList.remove('open'));
    mobileDrawer?.addEventListener('click', (e) => {
      if (e.target === mobileDrawer) mobileDrawer.classList.remove('open');
    });

    // Search modal
    const searchOverlay = document.getElementById('searchOverlay');
    const searchInput = document.getElementById('globalSearchInput');
    document.getElementById('openSearchBtn')?.addEventListener('click', () => {
      searchOverlay?.classList.add('open');
      renderSearchResults('');
      setTimeout(() => searchInput?.focus(), 60);
    });
    document.getElementById('closeSearchBtn')?.addEventListener('click', () => searchOverlay?.classList.remove('open'));
    searchOverlay?.addEventListener('click', (e) => {
      if (e.target === searchOverlay) searchOverlay.classList.remove('open');
    });
    searchInput?.addEventListener('input', (e) => renderSearchResults(e.target.value));

    // Cart Drawer toggles
    document.getElementById('openCartDrawerBtn')?.addEventListener('click', openCartDrawer);
    document.getElementById('closeCartDrawerBtn')?.addEventListener('click', closeCartDrawer);
    document.getElementById('cartBackdrop')?.addEventListener('click', closeCartDrawer);

    // Promo apply inside drawer
    document.getElementById('drawerApplyPromoBtn')?.addEventListener('click', () => {
      const input = document.getElementById('drawerPromoInput');
      if (!input) return;
      const res = window.EP_STORE.applyPromo(input.value);
      showToast(res.message, res.ok ? '✓' : '!');
      if (res.ok) input.value = '';
    });

    // Footer newsletter
    document.getElementById('footerNewsletterForm')?.addEventListener('submit', (e) => {
      e.preventDefault();
      const emailEl = document.getElementById('footerNewsletterEmail');
      if (emailEl?.value) {
        window.EP_STORE.subscribeNewsletter(emailEl.value);
        emailEl.value = '';
        showToast('Welcome to the Atelier! Use code NICH15 at checkout.');
      }
    });
  }

  function renderSearchResults(query) {
    const box = document.getElementById('globalSearchResults');
    if (!box) return;
    const q = (query || '').trim().toLowerCase();
    const products = window.EP_STORE.getProducts().filter(p =>
      !q ||
      p.title.toLowerCase().includes(q) ||
      p.category.toLowerCase().includes(q) ||
      p.description.toLowerCase().includes(q) ||
      p.sku.toLowerCase().includes(q)
    );
    if (products.length === 0) {
      box.innerHTML = `<div style="padding:28px; text-align:center; color:#737373; font-size:13px;">No pieces matched "${query}". Try searching "Bee", "Bangle", or "Pavé".</div>`;
      return;
    }
    box.innerHTML = products.slice(0, 7).map(p => {
      const thumb = p.imagesByMetal[p.defaultMetal] || p.gallery[0];
      return `
        <a href="product.html?id=${p.id}" class="search-result-item">
          <img src="${thumb}" alt="${p.title}" style="${p.isCharmImage ? 'object-fit:contain; padding:6px;' : ''}">
          <div style="flex:1;">
            <div style="font-size:10px; letter-spacing:0.12em; text-transform:uppercase; color:#737373;">${p.category}</div>
            <div style="font-size:13px; font-weight:600; color:#1b1b1b;">${p.title}</div>
          </div>
          <div style="font-size:13px; font-weight:600;">$${p.price.toFixed(2)}</div>
        </a>
      `;
    }).join('');
  }

  function openCartDrawer() {
    document.getElementById('cartBackdrop')?.classList.add('open');
    document.getElementById('cartDrawer')?.classList.add('open');
    syncBadgesAndDrawer();
  }

  function closeCartDrawer() {
    document.getElementById('cartBackdrop')?.classList.remove('open');
    document.getElementById('cartDrawer')?.classList.remove('open');
  }

  function syncBadgesAndDrawer() {
    if (!window.EP_STORE) return;

    const cartCount = window.EP_STORE.getCartCount();
    const wishCount = window.EP_STORE.getWishlist().length;
    const user = window.EP_STORE.getUser();

    const navCart = document.getElementById('navCartCount');
    if (navCart) {
      navCart.textContent = cartCount;
      navCart.classList.toggle('hidden', cartCount === 0);
    }

    const navWish = document.getElementById('navWishlistCount');
    if (navWish) {
      navWish.textContent = wishCount;
      navWish.classList.toggle('hidden', wishCount === 0);
    }

    const acctDot = document.getElementById('accountDot');
    if (acctDot) {
      acctDot.style.display = user.signedIn ? 'block' : 'none';
    }

    // Drawer elements
    const drawerCountEl = document.getElementById('drawerCartCount');
    if (drawerCountEl) drawerCountEl.textContent = cartCount;

    const totals = window.EP_STORE.getTotalsBreakdown();
    const shipBox = document.getElementById('shippingProgressBox');
    if (shipBox) {
      const pct = Math.min(100, (totals.afterDiscount / totals.freeThreshold) * 100);
      const remaining = Math.max(0, totals.freeThreshold - totals.afterDiscount);
      shipBox.innerHTML = totals.afterDiscount === 0
        ? `<span>Complimentary insured shipping on orders over $${totals.freeThreshold}.</span>`
        : remaining === 0
          ? `<span style="color:#2f855a; font-weight:600;">✓ You've unlocked Complimentary Insured Shipping!</span><div class="shipping-bar-track"><div class="shipping-bar-fill" style="width:100%;"></div></div>`
          : `<span>Add <strong>$${remaining.toFixed(2)}</strong> more for Complimentary Insured Shipping.</span><div class="shipping-bar-track"><div class="shipping-bar-fill" style="width:${pct}%;"></div></div>`;
    }

    const itemsBox = document.getElementById('cartDrawerItems');
    const footerBox = document.getElementById('cartDrawerFooter');
    const cart = window.EP_STORE.getCart();

    if (itemsBox) {
      if (cart.length === 0) {
        itemsBox.innerHTML = `
          <div style="text-align:center; padding:60px 20px;">
            <div class="serif" style="font-size:26px; margin-bottom:8px;">Your Jewelry Bag is Empty</div>
            <p style="font-size:12px; color:#737373; margin-bottom:22px;">Start by building a bespoke piece in our 3D Studio or browse our signature collection.</p>
            <div style="display:flex; flex-direction:column; gap:10px;">
              <a href="customizer.html" class="btn btn-gold btn-sm">Design in 3D Studio</a>
              <a href="collections.html" class="btn btn-outline btn-sm">Explore Best Sellers</a>
            </div>
          </div>
        `;
        if (footerBox) footerBox.style.display = 'none';
      } else {
        if (footerBox) footerBox.style.display = 'block';
        itemsBox.innerHTML = cart.map(item => {
          const metalLabel = (window.EP_DB.metals[item.metal] && window.EP_DB.metals[item.metal].name) || item.metal || '';
          let customHTML = '';
          if (item.type === 'custom-bangle') {
            const frontPills = (item.frontCharms || []).map(c => `<span class="mini-charm-pill"><img src="${c.imgUrl}" alt="">${c.title}</span>`).join('');
            const backPills = (item.backCharms || []).map(c => `<span class="mini-charm-pill"><img src="${c.imgUrl}" alt="">${c.title}</span>`).join('');
            customHTML = `
              ${frontPills ? `<div style="font-size:10px; color:#737373; margin-top:4px;">Front:</div><div class="custom-charm-pills">${frontPills}</div>` : ''}
              ${backPills ? `<div style="font-size:10px; color:#737373; margin-top:4px;">Back:</div><div class="custom-charm-pills">${backPills}</div>` : ''}
              <a href="customizer.html?cartUid=${encodeURIComponent(item.uid)}" style="font-size:10px; font-weight:600; color:#8b661d; text-decoration:underline; display:inline-block; margin-top:4px;">Edit Design in 3D &rarr;</a>
            `;
          }
          return `
            <div class="cart-item-card">
              <div class="cart-item-thumb">
                <img src="${item.image}" alt="${item.title}">
              </div>
              <div class="cart-item-info">
                <div style="display:flex; justify-content:space-between; gap:8px;">
                  <div class="cart-item-name">${item.title}</div>
                  <button onclick="EP_STORE.removeFromCart('${item.uid}')" style="background:none; border:none; cursor:pointer; color:#999; font-size:16px;" title="Remove">&times;</button>
                </div>
                <div class="cart-item-meta">
                  ${metalLabel}${item.size ? ' &bull; Size ' + item.size : ''}${item.letterChoice ? ' &bull; Letter ' + item.letterChoice.toUpperCase() : ''}
                </div>
                ${item.giftNote ? `<div style="font-size:10px; font-style:italic; color:#8b661d; margin-bottom:4px;">Note: "${item.giftNote}"</div>` : ''}
                ${customHTML}
                <div style="display:flex; justify-content:space-between; align-items:center; margin-top:10px;">
                  <div class="qty-controls">
                    <button onclick="EP_STORE.updateCartQty('${item.uid}', -1)">-</button>
                    <span>${item.qty}</span>
                    <button onclick="EP_STORE.updateCartQty('${item.uid}', 1)">+</button>
                  </div>
                  <strong style="font-size:13px;">$${(item.unitPrice * item.qty).toFixed(2)}</strong>
                </div>
              </div>
            </div>
          `;
        }).join('');
      }
    }

    const subEl = document.getElementById('drawerSubtotal');
    const discRow = document.getElementById('drawerDiscountRow');
    const discAmt = document.getElementById('drawerDiscountAmt');
    const totalEl = document.getElementById('drawerTotal');
    const promoTag = document.getElementById('drawerPromoActive');

    if (subEl) subEl.textContent = `$${totals.subtotal.toFixed(2)}`;
    if (totalEl) totalEl.textContent = `$${totals.afterDiscount.toFixed(2)}`;
    if (discRow && discAmt) {
      if (totals.discount > 0) {
        discRow.style.display = 'flex';
        discAmt.textContent = `-$${totals.discount.toFixed(2)}`;
      } else {
        discRow.style.display = 'none';
      }
    }
    if (promoTag) {
      if (totals.promo) {
        promoTag.style.display = 'flex';
        promoTag.innerHTML = `<span>Applied: <strong>${totals.promo.code}</strong> (${totals.promo.label})</span><button onclick="EP_STORE.removePromo()" style="background:none;border:none;color:#c53030;cursor:pointer;font-size:10px;">Remove</button>`;
      } else {
        promoTag.style.display = 'none';
      }
    }
  }

  function renderProductCard(p) {
    const thumb = p.imagesByMetal[p.defaultMetal] || p.gallery[0];
    const inWish = window.EP_STORE.isProductInWishlist(p.id);
    const swatches = (p.availableMetals || []).map(m => `<span class="mini-swatch ${m}" title="${window.EP_DB.metals[m]?.name || m}"></span>`).join('');
    const badgeHTML = p.badge ? `<span class="product-badge ${p.customizable3d ? 'is-3d' : ''}">${p.badge}</span>` : '';

    const primaryAction = p.customizable3d
      ? `<a href="customizer.html?metal=${p.defaultMetal}" class="btn btn-gold btn-sm" style="flex:1;">Design in 3D</a>`
      : `<button class="btn btn-primary btn-sm" style="flex:1;" onclick="EP_UI.quickAddProduct('${p.id}')">Quick Add</button>`;

    const mobileActionHTML = p.customizable3d
      ? `<a href="customizer.html?metal=${p.defaultMetal}" class="btn-card-mobile btn-gold">Design in 3D ✦</a>`
      : `<a href="product.html?id=${p.id}" class="btn-card-mobile btn-outline">View Piece</a>`;

    return `
      <div class="product-card" data-product-id="${p.id}">
        <div class="product-card-media ${p.isCharmImage ? 'is-charm-img' : ''}">
          ${badgeHTML}
          <button class="wishlist-heart-btn ${inWish ? 'active' : ''}" onclick="EP_UI.toggleWish('${p.id}', this)" title="Save to Wishlist">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
          </button>
          <a href="${p.customizable3d ? 'customizer.html?metal=' + p.defaultMetal : 'product.html?id=' + p.id}" class="product-card-img-link">
            <img src="${thumb}" alt="${p.title}" loading="lazy">
          </a>
          <div class="product-quick-actions">
            ${primaryAction}
            <a href="product.html?id=${p.id}" class="btn btn-ghost btn-sm">Details</a>
          </div>
        </div>
        <div class="product-card-body">
          <div class="product-card-category">${p.category} &bull; ★ ${p.rating.toFixed(1)}</div>
          <a href="${p.customizable3d ? 'customizer.html?metal=' + p.defaultMetal : 'product.html?id=' + p.id}" class="product-card-title">${p.title}</a>
          <div class="product-card-footer">
            <div class="product-price">
              $${p.price.toFixed(2)}
              ${p.compareAtPrice ? `<span style="text-decoration:line-through; color:#999; font-weight:400; font-size:11.5px; margin-left:4px;">$${p.compareAtPrice}</span>` : ''}
            </div>
            <div class="swatch-row">${swatches}</div>
          </div>
          <div class="product-mobile-action">
            ${mobileActionHTML}
          </div>
        </div>
      </div>
    `;
  }

  window.EP_UI = {
    toast: showToast,
    openCart: openCartDrawer,
    closeCart: closeCartDrawer,
    renderProductCard,
    quickAddProduct(productId) {
      const p = window.EP_STORE.getProductById(productId);
      if (!p) return;
      const metal = p.defaultMetal || 'yellow';
      window.EP_STORE.addToCart({
        type: 'product',
        productId: p.id,
        title: p.title,
        metal,
        size: p.hasSizes ? 'S' : null,
        letterChoice: p.hasLetterPicker ? 'E' : null,
        unitPrice: p.price,
        image: p.imagesByMetal[metal] || p.gallery[0],
        qty: 1
      });
      showToast(`${p.title} added to your bag!`);
      openCartDrawer();
    },
    toggleWish(productId, btnEl) {
      const added = window.EP_STORE.toggleProductWishlist(productId);
      if (btnEl) btnEl.classList.toggle('active', added);
      showToast(added ? 'Saved to your Wishlist ♥' : 'Removed from Wishlist', added ? '♥' : '•');
    }
  };

  document.addEventListener('DOMContentLoaded', () => {
    renderHeaderFooter();
    if (window.EP_STORE) {
      window.EP_STORE.subscribe(syncBadgesAndDrawer);
    }
  });
})();
