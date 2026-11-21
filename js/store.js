/* ==========================================================================
   NICH JEWELRY — CLIENT STORE & PERSISTENT DUMMY BACKEND
   ========================================================================== */

(function () {
  const STORAGE_KEYS = {
    INIT: 'ep_jewelry_initialized_v1',
    CART: 'ep_jewelry_cart_v1',
    WISHLIST: 'ep_jewelry_wishlist_v1',
    ORDERS: 'ep_jewelry_orders_v1',
    REVIEWS: 'ep_jewelry_reviews_v1',
    USER: 'ep_jewelry_user_v1',
    PROMO: 'ep_jewelry_promo_v1',
    NEWSLETTER: 'ep_jewelry_newsletter_v1',
    BOUTIQUES: 'ep_jewelry_boutiques_v1'
  };

  function readJSON(key, fallback) {
    try {
      const raw = localStorage.getItem(key);
      return raw ? JSON.parse(raw) : fallback;
    } catch (e) {
      return fallback;
    }
  }

  function writeJSON(key, value) {
    localStorage.setItem(key, JSON.stringify(value));
  }

  function ensureSeeded() {
    if (!localStorage.getItem(STORAGE_KEYS.INIT) && window.EP_DB) {
      writeJSON(STORAGE_KEYS.ORDERS, window.EP_DB.initialOrders || []);
      writeJSON(STORAGE_KEYS.REVIEWS, window.EP_DB.initialReviews || {});
      writeJSON(STORAGE_KEYS.BOUTIQUES, window.EP_DB.boutiques || []);

      // Pre-seed Wishlist with 1 inspiration Custom 3D Design + 1 signature piece
      // so first-time client demos immediately look vivid, while fully editable
      const seedWishlist = [
        {
          id: 'wish_custom_seed_1',
          type: 'custom-bangle',
          title: 'Signature Dual-Track Bangle (Saved 3D)',
          metal: 'yellow',
          size: 'S',
          price: 500,
          image: 'assets/images/bangle_gold_studio.jpg',
          frontCharms: [
            { id: 'bee', title: 'Mother of Pearl Bee', imgUrl: 'assets/charms/bee_gold.png', widthMm: 4.6, heightMm: 4.4, rotationDeg: 0, s: 0.44 },
            { id: 'martini', title: 'Martini with Olive', imgUrl: 'assets/charms/martini_gold.png', widthMm: 4.8, heightMm: 4.3, rotationDeg: 0, s: 0.56 }
          ],
          backCharms: [
            { id: 'heart', title: 'Solid Gold Heart', imgUrl: 'assets/charms/heart_gold.png', widthMm: 4.3, heightMm: 4.2, rotationDeg: 0, s: 0.50 }
          ],
          savedAt: new Date().toISOString()
        },
        {
          id: 'necklace-mop-medallion',
          type: 'product',
          productId: 'necklace-mop-medallion'
        }
      ];
      writeJSON(STORAGE_KEYS.WISHLIST, seedWishlist);
      writeJSON(STORAGE_KEYS.CART, []);

      // Seed demo signed-in member profile
      writeJSON(STORAGE_KEYS.USER, {
        signedIn: true,
        fullName: 'Layla Hassan',
        email: 'layla@example.com',
        phone: '+20 100 555 0192',
        tier: 'Atelier Gold Member',
        address: {
          street: '14 Zamalek Corniche El Nil',
          city: 'Cairo',
          country: 'Egypt',
          postal: '11211'
        }
      });

      localStorage.setItem(STORAGE_KEYS.INIT, 'true');
    }
  }

  ensureSeeded();

  const listeners = [];
  function notify() {
    listeners.forEach(fn => {
      try { fn(); } catch (e) { console.error(e); }
    });
  }

  window.EP_STORE = {
    subscribe(fn) {
      listeners.push(fn);
    },

    // --- PRODUCTS ---
    getProducts() {
      return (window.EP_DB && window.EP_DB.products) || [];
    },

    getProductById(id) {
      return this.getProducts().find(p => p.id === id) || null;
    },

    // --- CART ---
    getCart() {
      return readJSON(STORAGE_KEYS.CART, []);
    },

    getCartCount() {
      return this.getCart().reduce((sum, item) => sum + (item.qty || 1), 0);
    },

    getSubtotal() {
      return this.getCartSubtotal();
    },

    getCartSubtotal() {
      return this.getCart().reduce((sum, item) => sum + (item.unitPrice * (item.qty || 1)), 0);
    },

    addToCart(item) {
      const cart = this.getCart();
      // Merge identical standard products (not unique custom 3D bangles unless exact match)
      if (item.type !== 'custom-bangle') {
        const existing = cart.find(c =>
          c.type !== 'custom-bangle' &&
          c.productId === item.productId &&
          c.metal === item.metal &&
          c.size === item.size &&
          c.letterChoice === item.letterChoice &&
          (c.giftNote || '') === (item.giftNote || '')
        );
        if (existing) {
          existing.qty = (existing.qty || 1) + (item.qty || 1);
          writeJSON(STORAGE_KEYS.CART, cart);
          notify();
          return existing;
        }
      }

      const newItem = {
        uid: 'cart_' + Date.now() + '_' + Math.floor(Math.random() * 9999),
        qty: item.qty || 1,
        ...item
      };
      cart.push(newItem);
      writeJSON(STORAGE_KEYS.CART, cart);
      notify();
      return newItem;
    },

    updateCartQty(uid, delta) {
      let cart = this.getCart();
      const idx = cart.findIndex(c => c.uid === uid);
      if (idx === -1) return;
      cart[idx].qty = (cart[idx].qty || 1) + delta;
      if (cart[idx].qty <= 0) {
        cart.splice(idx, 1);
      }
      writeJSON(STORAGE_KEYS.CART, cart);
      notify();
    },

    removeFromCart(uid) {
      const cart = this.getCart().filter(c => c.uid !== uid);
      writeJSON(STORAGE_KEYS.CART, cart);
      notify();
    },

    clearCart() {
      writeJSON(STORAGE_KEYS.CART, []);
      localStorage.removeItem(STORAGE_KEYS.PROMO);
      notify();
    },

    // --- PROMO CODES ---
    getPromo() {
      return readJSON(STORAGE_KEYS.PROMO, null);
    },

    async applyPromoAsync(codeRaw) {
      const code = (codeRaw || '').trim().toUpperCase();
      if (!code) return { ok: false, valid: false, message: 'يرجى كتابة رمز الكود' };
      const subtotal = this.getCartSubtotal();
      try {
        const token = document.querySelector('meta[name="csrf-token"]')?.content;
        const res = await fetch('/api/promo/validate', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token || '' },
          body: JSON.stringify({ code: code, order_amount: subtotal })
        });
        const data = await res.json();
        if (data.success) {
          const promoObj = {
            code: data.code,
            type: data.discount_type === 'percentage' ? 'percent' : 'fixed',
            value: data.discount_value,
            label: data.title,
            discountPercent: data.discount_type === 'percentage' ? data.discount_value : null,
            maxDiscount: data.discount_amount,
            minSubtotal: 0
          };
          writeJSON(STORAGE_KEYS.PROMO, promoObj);
          notify();
          return { ok: true, valid: true, promo: promoObj, discountPercent: promoObj.discountPercent, message: data.message };
        } else {
          return { ok: false, valid: false, message: data.message };
        }
      } catch (err) {
        return this.applyPromo(code);
      }
    },

    applyPromo(codeRaw) {
      const code = (codeRaw || '').trim().toUpperCase();
      const promo = window.EP_DB && window.EP_DB.promos[code];
      if (!promo) {
        return { ok: false, message: 'Invalid promo code. Try NICH15 or ATELIER20.' };
      }
      const subtotal = this.getCartSubtotal();
      if (subtotal < promo.minSubtotal) {
        return { ok: false, message: `${code} requires a minimum order of $${promo.minSubtotal}.` };
      }
      writeJSON(STORAGE_KEYS.PROMO, promo);
      notify();
      return { ok: true, promo, message: `${promo.code} applied: ${promo.label}` };
    },

    removePromo() {
      localStorage.removeItem(STORAGE_KEYS.PROMO);
      notify();
    },

    getDiscount() {
      return this.getTotalsBreakdown().discount;
    },

    getGrandTotal() {
      const t = this.getTotalsBreakdown();
      return t.afterDiscount;
    },

    getTotalsBreakdown() {
      const subtotal = this.getCartSubtotal();
      const promo = this.getPromo();
      let discount = 0;
      if (promo && subtotal >= (promo.minSubtotal || 0)) {
        discount = promo.type === 'percent'
          ? Math.round(subtotal * (promo.value / 100) * 100) / 100
          : Math.min(subtotal, promo.value);
      }
      const afterDiscount = Math.max(0, subtotal - discount);
      const freeThreshold = (window.EP_DB && window.EP_DB.brand.freeShippingThreshold) || 150;
      const qualifiesFreeShipping = afterDiscount >= freeThreshold || afterDiscount === 0;
      return {
        subtotal,
        discount,
        afterDiscount,
        promo,
        freeThreshold,
        qualifiesFreeShipping
      };
    },

    // --- WISHLIST (Products + Custom 3D Bangles) ---
    getWishlist() {
      return readJSON(STORAGE_KEYS.WISHLIST, []);
    },

    getWishlistCount() {
      return (this.getWishlist() || []).length;
    },

    isProductInWishlist(productId) {
      return this.getWishlist().some(w => w.type === 'product' && w.productId === productId);
    },

    isWishlisted(productId) {
      return this.isProductInWishlist(productId);
    },

    toggleProductWishlist(productId) {
      const list = this.getWishlist();
      const idx = list.findIndex(w => w.type === 'product' && w.productId === productId);
      let added = false;
      if (idx >= 0) {
        list.splice(idx, 1);
      } else {
        list.unshift({
          id: 'wish_prod_' + productId,
          type: 'product',
          productId,
          savedAt: new Date().toISOString()
        });
        added = true;
      }
      writeJSON(STORAGE_KEYS.WISHLIST, list);
      notify();
      return added;
    },

    saveCustomDesignToWishlist(designObj) {
      const list = this.getWishlist();
      const id = designObj.id || ('wish_custom_' + Date.now());
      const metalThumbs = {
        yellow: 'assets/images/bangle_gold_studio.jpg',
        white:  'assets/images/bangle_silver_studio.jpg',
        rose:   'assets/images/bangle_rose_studio.jpg'
      };
      const entry = {
        id,
        type: 'custom-bangle',
        title: designObj.title || 'Custom Dual-Sided Glider Bangle™',
        metal: designObj.metal || 'yellow',
        size: designObj.size || 'XS',
        price: designObj.price || 410,
        image: metalThumbs[designObj.metal || 'yellow'],
        frontCharms: designObj.frontCharms || [],
        backCharms: designObj.backCharms || [],
        savedAt: new Date().toISOString()
      };
      const existingIdx = list.findIndex(w => w.id === id);
      if (existingIdx >= 0) {
        list[existingIdx] = entry;
      } else {
        list.unshift(entry);
      }
      writeJSON(STORAGE_KEYS.WISHLIST, list);
      notify();
      return entry;
    },

    getWishlistItemById(id) {
      return this.getWishlist().find(w => w.id === id) || null;
    },

    removeWishlistItem(id) {
      const list = this.getWishlist().filter(w => w.id !== id);
      writeJSON(STORAGE_KEYS.WISHLIST, list);
      notify();
    },

    // --- USER & AUTH (SIMULATED) ---
    getUser() {
      return readJSON(STORAGE_KEYS.USER, { signedIn: false });
    },

    signIn(name, email) {
      const current = this.getUser();
      const updated = {
        ...current,
        signedIn: true,
        fullName: name || current.fullName || 'Guest Collector',
        email: email || current.email || 'collector@example.com',
        tier: 'Atelier Gold Member'
      };
      writeJSON(STORAGE_KEYS.USER, updated);
      notify();
      return updated;
    },

    signOut() {
      const current = this.getUser();
      writeJSON(STORAGE_KEYS.USER, { ...current, signedIn: false });
      notify();
    },

    updateUserProfile(patch) {
      const current = this.getUser();
      const updated = { ...current, ...patch };
      writeJSON(STORAGE_KEYS.USER, updated);
      notify();
      return updated;
    },

    // --- ORDERS ---
    getOrders() {
      return readJSON(STORAGE_KEYS.ORDERS, []);
    },

    getOrderByNumber(orderNumber) {
      return this.getOrders().find(o => o.orderNumber === orderNumber) || null;
    },

    placeOrder(details = {}) {
      const orders = this.getOrders();
      const orderNum = 'NJ-2026-' + Math.floor(1000 + Math.random() * 8999);
      const totals = this.getTotalsBreakdown();
      const shippingCost = Number.isFinite(details.shippingCost) ? details.shippingCost : 0;
      const taxRate = (window.EP_DB && window.EP_DB.brand && window.EP_DB.brand.taxRate) || 0.08;
      const tax = Number.isFinite(details.tax)
        ? details.tax
        : Math.round(totals.afterDiscount * taxRate * 100) / 100;
      const computedTotal = Math.round((totals.afterDiscount + shippingCost + tax) * 100) / 100;

      const newOrder = {
        orderNumber: orderNum,
        createdAt: new Date().toISOString(),
        status: 'Order Confirmed',
        stepIndex: 0,
        items: details.items || this.getCart(),
        subtotal: Number.isFinite(details.subtotal) ? details.subtotal : totals.subtotal,
        discount: Number.isFinite(details.discount) ? details.discount : totals.discount,
        shippingCost,
        tax,
        ...details,
        total: Number.isFinite(details.total) ? details.total : computedTotal
      };
      orders.unshift(newOrder);
      writeJSON(STORAGE_KEYS.ORDERS, orders);
      this.clearCart();
      notify();
      return newOrder;
    },

    // --- REVIEWS ---
    getReviews(productId) {
      const all = readJSON(STORAGE_KEYS.REVIEWS, {});
      return all[productId] || [];
    },

    addReview(productId, review) {
      const all = readJSON(STORAGE_KEYS.REVIEWS, {});
      if (!all[productId]) all[productId] = [];
      const entry = {
        id: 'rev_' + Date.now(),
        date: new Date().toISOString().split('T')[0],
        verified: true,
        ...review
      };
      all[productId].unshift(entry);
      writeJSON(STORAGE_KEYS.REVIEWS, all);
      notify();
      return entry;
    },

    // --- NEWSLETTER ---
    subscribeNewsletter(email) {
      const list = readJSON(STORAGE_KEYS.NEWSLETTER, []);
      if (!list.includes(email)) list.push(email);
      writeJSON(STORAGE_KEYS.NEWSLETTER, list);
      return true;
    },

    // --- BOUTIQUES / BRANCHES ---
    getBoutiques() {
      const stored = readJSON(STORAGE_KEYS.BOUTIQUES, null);
      if (stored && Array.isArray(stored) && stored.length > 0) return stored;
      return (window.EP_DB && window.EP_DB.boutiques) || [];
    },

    saveBoutique(boutique) {
      const list = this.getBoutiques().slice();
      const existingIdx = list.findIndex(b => b.id === boutique.id);
      if (existingIdx >= 0) {
        list[existingIdx] = { ...list[existingIdx], ...boutique };
      } else {
        const newId = boutique.id || ('btq_' + Date.now());
        list.push({ ...boutique, id: newId });
      }
      writeJSON(STORAGE_KEYS.BOUTIQUES, list);
      notify();
      return list;
    },

    deleteBoutique(id) {
      const list = this.getBoutiques().filter(b => b.id !== id);
      writeJSON(STORAGE_KEYS.BOUTIQUES, list);
      notify();
      return list;
    },

    resetBoutiques() {
      const def = (window.EP_DB && window.EP_DB.boutiques) || [];
      writeJSON(STORAGE_KEYS.BOUTIQUES, def);
      notify();
      return def;
    }
  };
})();
