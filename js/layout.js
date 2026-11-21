/* ==========================================================================
   NICH JEWELRY — GLOBAL HEADER, CART DRAWER, SEARCH & FOOTER
   Bilingual i18n integrated (Arabic & English)
   ========================================================================== */

(function () {
  function currentFile() {
    const path = window.location.pathname;
    if (path.includes('/atelier') || path.includes('customizer')) return 'customizer.html';
    if (path.includes('/collections')) return 'collections.html';
    if (path.includes('/about')) return 'about.html';
    if (path.includes('/account')) return 'account.html';
    if (path.includes('/wishlist')) return 'wishlist.html';
    if (path.includes('/checkout')) return 'checkout.html';
    if (path.includes('/product')) return 'product.html';
    const parts = path.split('/');
    return parts[parts.length - 1] || 'index.html';
  }

  function getRoute(page, query = '') {
    const path = window.location.pathname;
    const match = path.match(/^\/(ar|en)(\/|$)/);
    const locale = match ? match[1] : (window.nicheI18n ? window.nicheI18n.getLanguage() : 'ar');
    const isLaravel = !!match || window.location.port === '8000';

    if (isLaravel) {
      let segment = page.replace('.html', '');
      if (segment === 'index') segment = '';
      if (segment === 'customizer') segment = 'atelier';
      const base = `/${locale}` + (segment ? `/${segment}` : '');
      return query ? `${base}${query.startsWith('?') || query.startsWith('#') ? '' : '?'}${query}` : base;
    }
    return query ? `${page}${query.startsWith('?') || query.startsWith('#') ? '' : '?'}${query}` : page;
  }

  function getProductHref(p) {
    if (p.customizable3d) {
      return getRoute('customizer.html', `?metal=${p.defaultMetal || 'yellow'}`);
    }
    const path = window.location.pathname;
    const match = path.match(/^\/(ar|en)(\/|$)/);
    const locale = match ? match[1] : (window.nicheI18n ? window.nicheI18n.getLanguage() : 'ar');
    const isLaravel = !!match || window.location.port === '8000';
    if (isLaravel) {
      const slug = p.slug || p.id;
      return `/${locale}/product/${slug}`;
    }
    return `product.html?id=${p.id}`;
  }

  function T(key, params = {}) {
    if (window.nicheI18n && typeof window.nicheI18n.t === 'function') {
      return window.nicheI18n.t(key, params);
    }
    return key;
  }

  function getLangSwitcher(extraClass = '') {
    if (window.nicheI18n && typeof window.nicheI18n.getLanguageSwitcherHTML === 'function') {
      return window.nicheI18n.getLanguageSwitcherHTML(extraClass);
    }
    return '';
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
    const lang = window.nicheI18n ? window.nicheI18n.getLanguage() : 'ar';

    // Top Header Markup
    const headerHTML = `
      <div class="announcement-bar" id="luxuryAnnouncementBar">
        <div class="announcement-ticker-track" id="announcementTickerTrack">
          <div class="announcement-item active">
            <span>✨ <strong>${lang === 'ar' ? 'الجمعة الذهبية:' : 'GOLDEN FRIDAY:'}</strong> ${lang === 'ar' ? 'خصم 15% إضافي بكود' : 'Extra 15% Off with code'} <strong class="promo-gold-tag" id="topBarPromoCopy">GOLDEN15</strong> <span class="promo-click-hint">${lang === 'ar' ? '(انقري للنسخ ✦)' : '(Click to copy ✦)'}</span></span>
          </div>
          <div class="announcement-item">
            <span>✦ <strong>${lang === 'ar' ? 'شحن فاخر ومؤمّن مجاناً' : 'Complimentary Insured Delivery'}</strong> ${lang === 'ar' ? 'لكافة الطلبات مع تغليف هدايا ملكي' : 'on all fine jewelry orders with gift box'}</span>
          </div>
          <div class="announcement-item">
            <span>💎 <strong>${lang === 'ar' ? 'استوديو التصميم 3D:' : 'Bespoke 3D Studio:'}</strong> ${lang === 'ar' ? 'صممي إسورتكِ الحصرية بلمستكِ ونقش تذكاري مجاني' : 'Craft your custom glider bangle with free engraving'}</span>
          </div>
        </div>
      </div>
      <header class="site-header" id="siteHeader">
        <div class="container header-inner">
          <div class="header-left">
            <button class="icon-btn mobile-menu-btn" id="openMobileMenu" aria-label="Menu">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            </button>
            <div class="mobile-lang-wrap">
              ${getLangSwitcher()}
            </div>
            <nav class="header-nav">
              <a href="${getRoute('collections.html')}" class="nav-link ${activePage === 'collections.html' ? 'active' : ''}">${T('nav.shop_all')}</a>
              <a href="${getRoute('customizer.html')}" class="nav-link studio-pill ${activePage === 'customizer.html' ? 'active' : ''}">${T('nav.studio_3d')} ✦</a>
              <a href="${getRoute('collections.html', '?cat=charms')}" class="nav-link">${T('nav.charms')}</a>
              <a href="${getRoute('about.html')}" class="nav-link ${activePage === 'about.html' ? 'active' : ''}">${T('nav.our_story')}</a>
            </nav>
          </div>

          <a href="${getRoute('index.html')}" class="brand-logo" aria-label="Niche Jewelry">
            <img src="/assets/images/niche-logo-dark.png" alt="Niche Jewelry" class="brand-logo-img">
          </a>

          <div class="header-actions">
            <div class="desktop-lang-wrap">
              ${getLangSwitcher()}
            </div>
            <button class="icon-btn" id="openSearchBtn" title="${T('nav.search')}" aria-label="Search">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            </button>
            <a href="${getRoute('account.html')}" class="icon-btn nav-account-btn" title="${T('nav.account')}" aria-label="Account">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              <span id="accountDot" style="position:absolute; bottom:4px; right:4px; width:6px; height:6px; border-radius:50%; background:#c59b3f; display:none;"></span>
            </a>
            <a href="${getRoute('wishlist.html')}" class="icon-btn" title="${T('nav.wishlist')}" aria-label="Wishlist">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
              <span class="badge-count hidden" id="navWishlistCount">0</span>
            </a>
            <button class="icon-btn" id="openCartDrawerBtn" title="${T('nav.bag')}" aria-label="Bag">
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
            <a href="${getRoute('index.html')}" style="display:inline-block;"><img src="assets/images/niche-logo-dark.png" alt="Niche Jewelry" style="height:34px; width:auto; display:block;"></a>
            <div style="display:flex; align-items:center; gap:8px;">
              ${getLangSwitcher()}
              <button class="icon-btn" id="closeMobileMenu">&times;</button>
            </div>
          </div>
          <a href="${getRoute('index.html')}" class="mobile-nav-link">${lang === 'ar' ? 'الرئيسية' : 'Home'}</a>
          <a href="${getRoute('collections.html')}" class="mobile-nav-link">${T('nav.shop_all')}</a>
          <a href="${getRoute('customizer.html')}" class="mobile-nav-link" style="color:#8b661d;">${T('nav.studio_3d')} ✦</a>
          <a href="${getRoute('collections.html', '?cat=bangles')}" class="mobile-nav-link">${T('footer.bangles')}</a>
          <a href="${getRoute('collections.html', '?cat=charms')}" class="mobile-nav-link">${T('nav.charms')}</a>
          <a href="${getRoute('wishlist.html')}" class="mobile-nav-link">${T('nav.wishlist')}</a>
          <a href="${getRoute('account.html')}" class="mobile-nav-link">${T('nav.drawer_orders')}</a>
          <a href="${getRoute('about.html')}" class="mobile-nav-link">${T('nav.our_story')}</a>
        </div>
      </div>

      <!-- Search Overlay Modal -->
      <div class="search-overlay" id="searchOverlay">
        <div class="search-modal">
          <div class="search-input-row">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#737373" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" id="globalSearchInput" placeholder="${lang === 'ar' ? 'ابحثي في أساور 18K، دلاية النحلة، الحروف، الخواتم...' : 'Search 18K bangles, bee charm, pavé initials, rings...'}" autocomplete="off">
            <button class="icon-btn" id="closeSearchBtn" style="font-size:22px;">&times;</button>
          </div>
          <div class="search-results" id="globalSearchResults"></div>
        </div>
      </div>

      <!-- Global Slide-Out Cart Drawer -->
      <div class="drawer-backdrop" id="cartBackdrop"></div>
      <aside class="cart-drawer" id="cartDrawer" aria-label="Shopping Bag">
        <div class="cart-drawer-header">
          <h2 class="cart-drawer-title">${T('cart.title')} (<span id="drawerCartCount">0</span>)</h2>
          <button class="icon-btn" id="closeCartDrawerBtn" style="font-size:24px; line-height:1;">&times;</button>
        </div>
        <div class="shipping-progress-box" id="shippingProgressBox"></div>
        <div class="cart-drawer-items" id="cartDrawerItems"></div>
        <div class="cart-drawer-footer" id="cartDrawerFooter">
          <div class="promo-inline">
            <input type="text" id="drawerPromoInput" placeholder="${T('cart.promo_label')} (NICH15)">
            <button class="btn btn-outline btn-sm" id="drawerApplyPromoBtn">${T('cart.apply')}</button>
          </div>
          <div id="drawerPromoActive" style="display:none; font-size:11px; color:#2b6cb0; margin-bottom:10px; justify-content:space-between; align-items:center;"></div>
          <div style="display:flex; justify-content:space-between; font-size:13px; margin-bottom:4px;">
            <span>${T('cart.subtotal')}</span>
            <strong id="drawerSubtotal">$0.00</strong>
          </div>
          <div id="drawerDiscountRow" style="display:none; justify-content:space-between; font-size:12px; color:#2f855a; margin-bottom:6px;">
            <span>${lang === 'ar' ? 'خصم الكوبون' : 'Promo Discount'}</span>
            <span id="drawerDiscountAmt">-$0.00</span>
          </div>
          <div style="display:flex; justify-content:space-between; font-size:16px; font-weight:600; padding-top:8px; border-top:1px solid #e6e3dc; margin-bottom:14px;">
            <span>${lang === 'ar' ? 'المجموع النهائي' : 'Estimated Total'}</span>
            <span class="serif" style="font-size:22px;" id="drawerTotal">$0.00</span>
          </div>
          <a href="${getRoute('checkout.html')}" class="btn btn-primary" style="width:100%;" id="drawerCheckoutBtn">
            ${T('cart.checkout_btn')} &rarr;
          </a>
        </div>
      </aside>

      <!-- ✦ First-Visit Luxury Campaign Pop-up (Minimalist Banner & Copy Code) ✦ -->
      <div class="promo-modal-backdrop" id="nichPromoModalBackdrop">
        <div class="promo-modal-card">
          <button class="promo-modal-close" id="closePromoModalBtn" aria-label="Close offer">&times;</button>
          
          <!-- Clickable Image Banner: Clicks act just like the button -->
          <a href="${getRoute('collections.html', '?promo=GOLDEN15')}" class="promo-banner-link" id="modalBannerClickable" title="${lang === 'ar' ? 'انقري للتسوق وتفعيل الخصم ✦' : 'Click to shop and activate code ✦'}">
            <img src="assets/images/promo_popup_golden_friday.jpg" alt="NICH Jewelry • Golden Atelier Offer" class="promo-banner-img">
            <div class="promo-banner-overlay-badge">
              <span>✦ ${lang === 'ar' ? 'خصم 15% إضافي بكود' : 'EXTRA 15% OFF WITH'} <strong>GOLDEN15</strong></span>
            </div>
          </a>

          <!-- Minimalist Bottom Bar: Code + Copy Button -->
          <div class="promo-modal-bottom-bar">
            <div class="promo-code-display">
              <span class="promo-code-label">${lang === 'ar' ? 'كود الخصم:' : 'PROMO CODE:'}</span>
              <strong class="promo-code-val" id="modalPromoCodeStr">GOLDEN15</strong>
            </div>
            <button type="button" class="promo-copy-action-btn" id="modalCopyCodeBtn">
              <span id="modalCopyBtnText">${lang === 'ar' ? 'نسخ الكود' : 'Copy Code'}</span>
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
            </button>
          </div>
        </div>
      </div>
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
            <div class="footer-grid">
              <div>
                <a href="${getRoute('index.html')}" style="display:inline-block; margin-bottom:20px;">
                  <img src="assets/images/niche-logo-white.png" alt="Niche Jewelry" style="height:48px; width:auto; display:block;">
                </a>
                <p class="footer-desc">
                  ${T('footer.brand_desc')}
                </p>
              </div>
              <div>
                <div class="footer-col-title">${T('footer.shop_title')}</div>
                <ul class="footer-links">
                  <li><a href="${getRoute('collections.html', '?cat=bangles')}">${T('footer.bangles')}</a></li>
                  <li><a href="${getRoute('collections.html', '?cat=charms')}">${T('footer.cutout_charms')}</a></li>
                  <li><a href="${getRoute('collections.html', '?cat=necklaces')}">${T('footer.necklaces')}</a></li>
                  <li><a href="${getRoute('collections.html', '?cat=earrings')}">${T('footer.earrings')}</a></li>
                  <li><a href="${getRoute('collections.html', '?cat=rings')}">${T('footer.rings')}</a></li>
                </ul>
              </div>
              <div>
                <div class="footer-col-title">${T('footer.atelier_title')}</div>
                <ul class="footer-links">
                  <li><a href="${getRoute('customizer.html')}">${T('nav.studio_3d')} ✦</a></li>
                  <li><a href="${getRoute('index.html', '#boutiques-section')}">فروعنا وبوتيكات الكويت ✦</a></li>
                  <li><a href="${getRoute('about.html')}">${T('footer.our_ethics')}</a></li>
                  <li><a href="${getRoute('about.html', '#sizing')}">${T('footer.sizing_guide')}</a></li>
                  <li><a href="${getRoute('about.html', '#care')}">${T('footer.gold_care')}</a></li>
                  <li><a href="${getRoute('wishlist.html')}">${T('footer.saved_designs')}</a></li>
                  <li><a href="${getRoute('account.html')}">${T('footer.track_order')}</a></li>
                </ul>
              </div>
              <div>
                <div class="footer-col-title">${T('footer.collector_title')}</div>
                <p style="font-size:12px; color:#b5afa3; line-height:1.6; margin-bottom:12px;">${T('footer.collector_sub')} <strong style="color:#FAF8F5;">NICH15</strong>.</p>
                <form class="footer-newsletter-capsule" id="footerNewsletterForm">
                  <input type="email" id="footerNewsletterEmail" placeholder="${T('footer.email_placeholder')}" required aria-label="Email address for collector list">
                  <button type="submit" class="newsletter-submit-btn" aria-label="Join newsletter">
                    <span>${T('footer.join_btn')}</span>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14m-7-7l7 7-7 7"/></svg>
                  </button>
                </form>
              </div>
            </div>
            <div class="footer-bottom">
              <span class="footer-copy">${T('footer.copyright')}</span>
              <div class="footer-payment-tags">
                <span class="pay-tag">${T('footer.tag_gold')}</span>
                <span class="pay-tag">${T('footer.tag_silver')}</span>
                <span class="pay-tag">${T('footer.tag_delivery')}</span>
                <span class="pay-tag">${T('footer.tag_secure')}</span>
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
    // 1. Promo copy click (Top Announcement Bar & Ticker)
    const handleCopyGolden15 = () => {
      navigator.clipboard?.writeText('GOLDEN15').then(() => {
        showToast('تم نسخ كوبون الخصم: GOLDEN15 (خصم 15% إضافي)', '✨');
      }).catch(() => {
        showToast('Code: GOLDEN15', '✨');
      });
    };
    document.getElementById('copyPromoBtn')?.addEventListener('click', handleCopyGolden15);
    document.getElementById('topBarPromoCopy')?.addEventListener('click', handleCopyGolden15);

    // 2. Announcement Ticker Auto-Cycle
    const tickerTrack = document.getElementById('announcementTickerTrack');
    if (tickerTrack) {
      const items = tickerTrack.querySelectorAll('.announcement-item');
      if (items.length > 1) {
        let currentIdx = 0;
        setInterval(() => {
          items[currentIdx].classList.remove('active');
          currentIdx = (currentIdx + 1) % items.length;
          items[currentIdx].classList.add('active');
        }, 4000);
      }
    }

    // 3. First-Visit Luxury Campaign Pop-up Modal (Minimalist Banner & Copy Code)
    const promoBackdrop = document.getElementById('nichPromoModalBackdrop');
    const closePromoBtn = document.getElementById('closePromoModalBtn');
    const modalCopyBtn = document.getElementById('modalCopyCodeBtn');
    const modalCopyText = document.getElementById('modalCopyBtnText');
    const modalBanner = document.getElementById('modalBannerClickable');

    function openPromoModal() {
      if (!promoBackdrop) return;
      promoBackdrop.classList.add('visible');
    }

    function closePromoModal() {
      if (!promoBackdrop) return;
      promoBackdrop.classList.remove('visible');
      try {
        sessionStorage.setItem('nich_golden_popup_seen', 'true');
      } catch (e) {}
    }

    window.openPromoPopup = openPromoModal;

    closePromoBtn?.addEventListener('click', closePromoModal);
    promoBackdrop?.addEventListener('click', (e) => {
      if (e.target === promoBackdrop) closePromoModal();
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && promoBackdrop?.classList.contains('visible')) {
        closePromoModal();
      }
    });

    // Copy Code Button
    modalCopyBtn?.addEventListener('click', (e) => {
      e.stopPropagation();
      navigator.clipboard?.writeText('GOLDEN15').then(() => {
        if (modalCopyText) {
          modalCopyText.textContent = window.nicheI18n?.getLanguage() === 'en' ? '✓ Copied!' : '✓ تم النسخ!';
        }
        showToast(window.nicheI18n?.getLanguage() === 'en' ? 'Code copied: GOLDEN15 (15% OFF) ✦' : 'تم نسخ كود الخصم: GOLDEN15 (خصم 15%) ✦', '✨');
        try {
          sessionStorage.setItem('appliedPromo', 'GOLDEN15');
        } catch (err) {}
        setTimeout(() => {
          if (modalCopyText) {
            modalCopyText.textContent = window.nicheI18n?.getLanguage() === 'en' ? 'Copy Code' : 'نسخ الكود';
          }
        }, 3000);
      });
    });

    // Clicking image acts just like clicking the action button: copies code, applies discount & opens shop
    modalBanner?.addEventListener('click', (e) => {
      e.preventDefault();
      try {
        sessionStorage.setItem('appliedPromo', 'GOLDEN15');
      } catch (err) {}
      navigator.clipboard?.writeText('GOLDEN15').catch(() => {});
      showToast(window.nicheI18n?.getLanguage() === 'en' ? 'Promo code GOLDEN15 applied! ✨' : 'تم تفعيل كود الخصم: GOLDEN15 بنجاح! ✨', '✨');
      closePromoModal();
      setTimeout(() => {
        window.location.href = getRoute('collections.html', '?promo=GOLDEN15');
      }, 300);
    });

    // Check first visit and trigger popup
    try {
      const hasSeen = sessionStorage.getItem('nich_golden_popup_seen');
      if (!hasSeen) {
        setTimeout(openPromoModal, 1200);
      }
    } catch (e) {}

    // Mobile nav drawer
    const openMenuBtn = document.getElementById('openMobileMenu');
    const closeMenuBtn = document.getElementById('closeMobileMenu');
    const navDrawer = document.getElementById('mobileNavDrawer');
    openMenuBtn?.addEventListener('click', () => navDrawer?.classList.add('open'));
    closeMenuBtn?.addEventListener('click', () => navDrawer?.classList.remove('open'));
    navDrawer?.addEventListener('click', (e) => {
      if (e.target === navDrawer) navDrawer.classList.remove('open');
    });

    // Search overlay
    const openSearchBtn = document.getElementById('openSearchBtn');
    const closeSearchBtn = document.getElementById('closeSearchBtn');
    const searchOverlay = document.getElementById('searchOverlay');
    const searchInput = document.getElementById('globalSearchInput');
    const searchResults = document.getElementById('globalSearchResults');

    function openSearch() {
      searchOverlay?.classList.add('open');
      setTimeout(() => searchInput?.focus(), 120);
    }
    function closeSearch() {
      searchOverlay?.classList.remove('open');
      if (searchInput) searchInput.value = '';
      if (searchResults) searchResults.innerHTML = '';
    }

    openSearchBtn?.addEventListener('click', openSearch);
    closeSearchBtn?.addEventListener('click', closeSearch);
    searchOverlay?.addEventListener('click', (e) => {
      if (e.target === searchOverlay) closeSearch();
    });

    searchInput?.addEventListener('input', (e) => {
      const q = e.target.value.trim().toLowerCase();
      if (!q || !window.EP_DB) {
        if (searchResults) searchResults.innerHTML = '';
        return;
      }
      const matches = window.EP_DB.products.filter(p =>
        p.title.toLowerCase().includes(q) ||
        p.description.toLowerCase().includes(q) ||
        p.category.toLowerCase().includes(q) ||
        (p.charmIds || []).some(id => id.includes(q))
      ).slice(0, 6);

      if (matches.length === 0) {
        searchResults.innerHTML = `<div style="padding:24px; text-align:center; color:#787268; font-size:13px;">No jewelry matching "${q}"</div>`;
        return;
      }

      searchResults.innerHTML = matches.map(p => `
        <a href="${getProductHref(p)}" class="search-result-item" style="display:flex; align-items:center; gap:14px; padding:12px 14px; border-bottom:1px solid #f0ede6; text-decoration:none; color:inherit;">
          <img src="${p.gallery[0]}" style="width:48px; height:48px; object-fit:cover; border-radius:4px; background:#f4f0e8;">
          <div style="flex:1;">
            <div style="font-size:13px; font-weight:600;">${p.title}</div>
            <div style="font-size:11px; color:#787268;">${p.category} &bull; $${p.price.toFixed(2)}</div>
          </div>
          <span style="font-size:11px; color:#c59b3f; font-weight:600;">${p.customizable3d ? T('common.design_in_3d') : T('common.view_piece')} &rarr;</span>
        </a>
      `).join('');
    });

    // Cart drawer
    const openCartBtn = document.getElementById('openCartDrawerBtn');
    const closeCartBtn = document.getElementById('closeCartDrawerBtn');
    openCartBtn?.addEventListener('click', openCartDrawer);
    closeCartBtn?.addEventListener('click', closeCartDrawer);
    document.getElementById('cartBackdrop')?.addEventListener('click', closeCartDrawer);

    // Footer newsletter
    document.getElementById('footerNewsletterForm')?.addEventListener('submit', (e) => {
      e.preventDefault();
      const emailEl = document.getElementById('footerNewsletterEmail');
      if (emailEl && emailEl.value) {
        showToast(T('footer.joined_success'), '✦');
        emailEl.value = '';
      }
    });

    // Promo apply inside drawer
    document.getElementById('drawerApplyPromoBtn')?.addEventListener('click', async () => {
      const input = document.getElementById('drawerPromoInput');
      const code = input ? input.value.trim() : '';
      if (!window.EP_STORE) return;
      const res = window.EP_STORE.applyPromoAsync 
        ? await window.EP_STORE.applyPromoAsync(code)
        : window.EP_STORE.applyPromo(code);
      if (res.valid || res.ok) {
        showToast(res.message || `Promo Applied: ${res.discountPercent || ''}% Off`, '✦');
      } else {
        showToast(res.message || 'Invalid promo code', '•');
      }
      syncBadgesAndDrawer();
    });
  }

  function openCartDrawer() {
    document.getElementById('cartDrawer')?.classList.add('open');
    document.getElementById('cartBackdrop')?.classList.add('open');
    document.body.style.overflow = 'hidden';
    syncBadgesAndDrawer();
  }

  function closeCartDrawer() {
    document.getElementById('cartDrawer')?.classList.remove('open');
    document.getElementById('cartBackdrop')?.classList.remove('open');
    document.body.style.overflow = '';
  }

  function syncBadgesAndDrawer() {
    if (!window.EP_STORE) return;
    const cartCount = window.EP_STORE.getCartCount ? window.EP_STORE.getCartCount() : 0;
    const wishCount = (typeof window.EP_STORE.getWishlistCount === 'function') 
      ? window.EP_STORE.getWishlistCount() 
      : ((window.EP_STORE && window.EP_STORE.getWishlist) ? window.EP_STORE.getWishlist().length : 0);

    const navCartBadge = document.getElementById('navCartCount');
    if (navCartBadge) {
      navCartBadge.textContent = cartCount;
      navCartBadge.classList.toggle('hidden', cartCount === 0);
    }

    const navWishBadge = document.getElementById('navWishlistCount');
    if (navWishBadge) {
      navWishBadge.textContent = wishCount;
      navWishBadge.classList.toggle('hidden', wishCount === 0);
    }

    const drawerCountEl = document.getElementById('drawerCartCount');
    if (drawerCountEl) drawerCountEl.textContent = cartCount;

    // Render Cart Drawer Items
    const itemsContainer = document.getElementById('cartDrawerItems');
    const footerBox = document.getElementById('cartDrawerFooter');
    const shippingBox = document.getElementById('shippingProgressBox');
    if (!itemsContainer) return;

    const items = window.EP_STORE.getCart();

    if (items.length === 0) {
      itemsContainer.innerHTML = `
        <div class="empty-cart-state" style="padding:48px 24px; text-align:center;">
          <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="#a8a29e" stroke-width="1.3" style="margin:0 auto 16px;"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <h3 class="serif" style="font-size:22px; margin-bottom:8px;">${T('cart.empty_title')}</h3>
          <p style="font-size:12.5px; color:#787268; margin-bottom:20px; line-height:1.6;">${T('cart.empty_sub')}</p>
          <a href="${getRoute('customizer.html')}" class="btn btn-gold btn-sm" onclick="EP_UI.closeCart()">${T('cart.start_designing')}</a>
        </div>
      `;
      if (shippingBox) shippingBox.innerHTML = '';
      if (footerBox) footerBox.style.display = 'none';
      return;
    }

    if (footerBox) footerBox.style.display = 'block';

    // Free Shipping Progress
    const subtotal = (window.EP_STORE.getSubtotal ? (window.EP_STORE.getSubtotal ? window.EP_STORE.getSubtotal() : (window.EP_STORE.getCartSubtotal ? window.EP_STORE.getCartSubtotal() : 0)) : (window.EP_STORE.getCartSubtotal ? window.EP_STORE.getCartSubtotal() : 0));
    const freeThreshold = 150;
    const diff = freeThreshold - subtotal;
    const pct = Math.min(100, Math.round((subtotal / freeThreshold) * 100));

    if (shippingBox) {
      shippingBox.innerHTML = diff <= 0
        ? `<div class="free-shipping-achieved">✦ ${T('cart.free_insured')}!</div>`
        : `
          <div style="font-size:11.5px; margin-bottom:6px; color:#3d3934;">
            Add <strong>$${diff.toFixed(2)}</strong> for <strong>Free Insured Delivery</strong>
          </div>
          <div class="progress-bar-wrap">
            <div class="progress-bar-fill" style="width:${pct}%;"></div>
          </div>
        `;
    }

    // Render items list
    itemsContainer.innerHTML = items.map(item => {
      const isCustomBangle = item.type === 'custom-bangle';
      const itemTitle = isCustomBangle ? T('common.bangle_title') : item.title;
      let specs = [];
      if (item.metal) {
        const metalNames = { yellow: T('common.yellow_gold'), white: T('common.sterling_silver'), rose: T('common.rose_gold') };
        specs.push(metalNames[item.metal] || item.metal);
      }
      if (item.size) specs.push(`${T('common.wrist_size')}: ${item.size}`);
      if (isCustomBangle) {
        const fc = (item.frontCharms || []).length;
        const bc = (item.backCharms || []).length;
        specs.push(`${T('customizer.step_badge_front')}: ${fc} · ${T('customizer.step_badge_back')}: ${bc}`);
        if (item.engraving) {
          specs.push(`✦ “${item.engraving}”`);
        }
      }

      return `
        <div class="cart-item-row" data-cart-id="${item.cartId}">
          <div class="cart-item-media">
            <img src="${item.image || 'assets/images/bangle_gold_studio.jpg'}" alt="${itemTitle}">
          </div>
          <div class="cart-item-info">
            <div style="display:flex; justify-content:space-between; align-items:flex-start;">
              <h4 class="cart-item-title">${itemTitle}</h4>
              <button class="cart-item-remove" onclick="EP_STORE.removeFromCart('${item.cartId}')" title="${T('cart.remove_item')}">&times;</button>
            </div>
            <div class="cart-item-specs">${specs.join(' &bull; ')}</div>
            <div class="cart-item-bottom">
              <div class="cart-qty-ctrl">
                <button onclick="EP_STORE.updateItemQty('${item.cartId}', ${item.qty - 1})">&minus;</button>
                <span>${item.qty}</span>
                <button onclick="EP_STORE.updateItemQty('${item.cartId}', ${item.qty + 1})">&plus;</button>
              </div>
              <div class="cart-item-price">$${(item.unitPrice * item.qty).toFixed(2)}</div>
            </div>
          </div>
        </div>
      `;
    }).join('');

    // Summary Totals
    const subEl = document.getElementById('drawerSubtotal');
    const discRow = document.getElementById('drawerDiscountRow');
    const discAmt = document.getElementById('drawerDiscountAmt');
    const totalEl = document.getElementById('drawerTotal');
    const promoTag = document.getElementById('drawerPromoActive');

    if (subEl) subEl.textContent = `$${subtotal.toFixed(2)}`;

    const discount = (window.EP_STORE.getDiscount ? (window.EP_STORE.getDiscount ? window.EP_STORE.getDiscount() : (window.EP_STORE.getTotalsBreakdown ? window.EP_STORE.getTotalsBreakdown().discount : 0)) : (window.EP_STORE.getTotalsBreakdown ? window.EP_STORE.getTotalsBreakdown().discount : 0));
    if (discRow && discAmt) {
      if (discount > 0) {
        discRow.style.display = 'flex';
        discAmt.textContent = `-$${discount.toFixed(2)}`;
      } else {
        discRow.style.display = 'none';
      }
    }

    const grandTotal = (window.EP_STORE.getGrandTotal ? (window.EP_STORE.getGrandTotal ? window.EP_STORE.getGrandTotal() : (window.EP_STORE.getTotalsBreakdown ? window.EP_STORE.getTotalsBreakdown().afterDiscount : 0)) : (window.EP_STORE.getTotalsBreakdown ? window.EP_STORE.getTotalsBreakdown().afterDiscount : 0));
    if (totalEl) totalEl.textContent = `$${grandTotal.toFixed(2)}`;

    const promo = window.EP_STORE.getActivePromo();
    if (promoTag) {
      if (promo) {
        promoTag.style.display = 'flex';
        promoTag.innerHTML = `
          <span>✦ Code <strong>${promo.code}</strong> (${promo.percent}% off) applied</span>
          <button style="background:none; border:none; cursor:pointer; color:#787268; font-size:14px;" onclick="EP_STORE.clearPromo()">&times;</button>
        `;
      } else {
        promoTag.style.display = 'none';
        promoTag.innerHTML = '';
      }
    }
  }

  function renderProductCard(p) {
    const lang = (window.nicheI18n && window.nicheI18n.getLanguage()) || 'ar';
    const displayTitle = (lang === 'ar' && p.title_ar) ? p.title_ar : p.title;
    const displayCategory = (lang === 'ar' && p.category_ar) ? p.category_ar : p.category;
    if (!window.EP_STORE) return '';
    const inWish = window.EP_STORE.isProductInWishlist ? window.EP_STORE.isProductInWishlist(p.id) : (window.EP_STORE.isWishlisted ? window.EP_STORE.isWishlisted(p.id) : false);
    const thumb = p.gallery[0] || '';
    const swatches = (p.availableMetals || []).map(m => `<span class="mini-swatch ${m}" title="${window.EP_DB.metals[m]?.name || m}"></span>`).join('');
    const badgeHTML = p.badge ? `<span class="product-badge ${p.customizable3d ? 'is-3d' : ''}">${p.badge}</span>` : '';

    const prodHref = getProductHref(p);
    const primaryAction = p.customizable3d
      ? `<a href="${prodHref}" class="btn btn-gold btn-sm" style="flex:1;">${T('common.design_in_3d')}</a>`
      : `<button class="btn btn-primary btn-sm" style="flex:1;" onclick="EP_UI.quickAddProduct('${p.id}')">${T('common.view_piece')}</button>`;

    const mobileActionHTML = p.customizable3d
      ? `<a href="${prodHref}" class="btn-card-mobile btn-gold">${T('common.design_in_3d')}</a>`
      : `<a href="${prodHref}" class="btn-card-mobile btn-outline">${T('common.view_piece')}</a>`;

    return `
      <div class="product-card" data-product-id="${p.id}">
        <div class="product-card-media ${p.isCharmImage ? 'is-charm-img' : ''}">
          ${badgeHTML}
          <button class="wishlist-heart-btn ${inWish ? 'active' : ''}" onclick="EP_UI.toggleWish('${p.id}', this)" title="Save to Wishlist">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
          </button>
          <a href="${prodHref}" class="product-card-img-link">
            <img src="${thumb}" alt="${p.title}" loading="lazy">
          </a>
          <div class="product-quick-actions">
            ${primaryAction}
            <a href="${prodHref}" class="btn btn-ghost btn-sm">${T('common.details')}</a>
          </div>
        </div>
        <div class="product-card-body">
          <div class="product-card-category">${displayCategory} &bull; ★ ${p.rating.toFixed(1)}</div>
          <a href="${prodHref}" class="product-card-title">${displayTitle}</a>
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
      showToast(`${p.title} ${T('common.bag_added')}`);
      openCartDrawer();
    },
    toggleWish(productId, btnEl) {
      const added = window.EP_STORE.toggleProductWishlist(productId);
      if (btnEl) btnEl.classList.toggle('active', added);
      showToast(added ? T('common.saved') : 'Removed from Wishlist', added ? '♥' : '•');
    }
  };

  // Re-render when language changes
  window.addEventListener('niche:languageChange', () => {
    renderHeaderFooter();
  });

  document.addEventListener('DOMContentLoaded', () => {
    renderHeaderFooter();
    if (window.EP_STORE) {
      window.EP_STORE.subscribe(syncBadgesAndDrawer);
    }
  });
})();

