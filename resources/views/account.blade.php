<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Collector Account &amp; Orders &bull; NICH JEWELRY</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/styles.css">
  <script src="/js/db.js"></script>
  <script src="/js/store.js"></script>
  <script src="/js/i18n.js"></script>
  <script src="/js/layout.js"></script>
  <style>
    .account-header-banner {
      background: var(--bg-warm);
      border-bottom: 1px solid var(--border-light);
      padding: 44px 0;
    }

    .account-tabs {
      display: flex;
      gap: 10px;
      margin: 28px 0 24px;
      border-bottom: 1px solid var(--border-light);
      padding-bottom: 14px;
      flex-wrap: wrap;
    }

    .acct-tab-btn {
      padding: 9px 18px;
      border-radius: var(--radius-pill);
      border: 1px solid var(--border-light);
      background: #ffffff;
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      cursor: pointer;
    }

    .acct-tab-btn.active {
      background: var(--text-dark);
      color: #ffffff;
      border-color: var(--text-dark);
    }

    .order-card {
      background: #ffffff;
      border: 1px solid #e8e3d8;
      border-radius: 12px;
      padding: 24px;
      margin-bottom: 24px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
      transition: all 0.2s ease;
    }
    .order-card:hover {
      border-color: #d6caa9;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
    }

    /* Luxury Concierge Order Tracker */
    .luxury-tracker-card {
      background: #faf8f5;
      border: 1px solid #e8e3d8;
      border-radius: 10px;
      padding: 20px 16px;
      margin: 18px 0;
    }

    .tracker-header-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 1px solid #eee8dc;
    }

    .tracker-stage-headline {
      font-size: 12px;
      font-weight: 700;
      color: #1b1b1b;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .tracker-stage-badge {
      font-size: 10.5px;
      background: #f4ecdc;
      color: #8b661d;
      padding: 3px 10px;
      border-radius: 20px;
      font-weight: 600;
      letter-spacing: 0.04em;
    }

    .tracker-timeline {
      position: relative;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 10px 0 4px 0;
    }

    .tracker-timeline-line {
      position: absolute;
      top: 26px;
      left: 8%;
      right: 8%;
      height: 2px;
      background: #e2ded5;
      z-index: 1;
    }

    .tracker-timeline-progress {
      position: absolute;
      top: 26px;
      inset-inline-start: 8%;
      height: 2px;
      background: linear-gradient(90deg, #c59b3f 0%, #ecbe54 100%);
      z-index: 2;
      transition: width 0.4s ease;
    }

    .tracker-node {
      position: relative;
      z-index: 3;
      display: flex;
      flex-direction: column;
      align-items: center;
      flex: 1;
      text-align: center;
    }

    .tracker-node-circle {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: #ffffff;
      border: 2px solid #dcd7cc;
      color: #999;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: 700;
      transition: all 0.3s ease;
    }

    .tracker-node.completed .tracker-node-circle {
      background: #1b1b1b;
      border-color: #c59b3f;
      color: #c59b3f;
      box-shadow: 0 2px 8px rgba(197, 155, 63, 0.25);
    }

    .tracker-node.current .tracker-node-circle {
      background: #ffffff;
      border-color: #c59b3f;
      color: #1b1b1b;
      box-shadow: 0 0 0 4px rgba(197, 155, 63, 0.2);
    }

    .tracker-node-label {
      font-size: 11px;
      font-weight: 600;
      color: #888;
      margin-top: 10px;
      line-height: 1.35;
      max-width: 90px;
      transition: color 0.2s ease;
    }

    .tracker-node.completed .tracker-node-label,
    .tracker-node.current .tracker-node-label {
      color: #181715;
      font-weight: 700;
    }

    .tracker-node-status {
      font-size: 9.5px;
      color: #c59b3f;
      margin-top: 3px;
      font-weight: 500;
    }

    @media (max-width: 720px) {
      .tracker-timeline {
        flex-direction: column;
        align-items: stretch;
        gap: 16px;
        padding-inline-start: 18px;
      }
      .tracker-timeline-line {
        top: 10px;
        bottom: 10px;
        inset-inline-start: 34px;
        width: 2px;
        height: auto;
        right: auto;
        left: auto;
      }
      .tracker-timeline-progress {
        top: 10px;
        inset-inline-start: 34px;
        width: 2px;
        right: auto;
        left: auto;
        transition: height 0.4s ease;
      }
      .tracker-node {
        flex-direction: row;
        text-align: start;
        gap: 14px;
        align-items: center;
      }
      .tracker-node-circle {
        flex-shrink: 0;
      }
      .tracker-node-label {
        margin-top: 0;
        max-width: none;
        font-size: 12px;
      }
    }

    .auth-card {
      max-width: 460px;
      margin: 60px auto;
      background: #ffffff;
      border: 1px solid var(--border-light);
      border-radius: var(--radius-md);
      padding: 36px;
      box-shadow: var(--shadow-sm);
    }

    .profile-card {
      background: #ffffff;
      border: 1px solid var(--border-light);
      border-radius: var(--radius-md);
      padding: 28px;
      max-width: 680px;
    }

    .p-input {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid var(--border-light);
      background: var(--bg-cream);
      border-radius: 4px;
      font-size: 13px;
      margin-top: 6px;
    }
  </style>
</head>
<body>

  <div id="ep-header-mount"></div>
  <main id="accountRoot"></main>
  <div id="ep-footer-mount"></div>

  <script>
    let currentTab = 'orders'; // 'orders' | 'profile'

    function renderAccount() {
      const root = document.getElementById('accountRoot');
      const user = window.EP_STORE.getUser();
      const t = (k, params) => (window.nicheI18n ? window.nicheI18n.t(k, params) : k);

      if (!user.signedIn) {
        root.innerHTML = `
          <div class="container">
            <div class="auth-card">
              <div class="text-center mb-3">
                <span class="eyebrow">${t('account.portal_eyebrow')}</span>
                <h1 class="section-heading mt-1" style="font-size:34px;">${t('account.sign_in_title')}</h1>
                <p style="font-size:12.5px; color:#737373; margin-top:6px;">
                  ${t('account.sign_in_desc')}
                </p>
              </div>
              <form id="demoLoginForm">
                <div style="margin-bottom:14px;">
                  <label style="font-size:10px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase;">${t('checkout.full_name')}</label>
                  <input type="text" id="loginName" class="p-input" required value="Layla Hassan">
                </div>
                <div style="margin-bottom:20px;">
                  <label style="font-size:10px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase;">${t('account.email')}</label>
                  <input type="email" id="loginEmail" class="p-input" required value="layla@example.com">
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">${t('account.sign_in_btn')}</button>
                <div style="text-align:center; font-size:11px; color:#737373; margin-top:10px;">
                  ${t('account.demo_hint')}
                </div>
              </form>
            </div>
          </div>
        `;
        document.getElementById('demoLoginForm').addEventListener('submit', (e) => {
          e.preventDefault();
          window.EP_STORE.signIn(
            document.getElementById('loginName').value.trim(),
            document.getElementById('loginEmail').value.trim()
          );
          window.EP_UI.toast(t('account.sign_in_btn') + ' ✦');
        });
        return;
      }

      const orders = window.EP_STORE.getOrders();
      const wishCount = window.EP_STORE.getWishlist().length;

      let tabHTML = '';
      if (currentTab === 'orders') {
        const stages = [
          { name: t('account.status_placed'), icon: '✦', sub: 'تم تسجيل الطلب' },
          { name: t('account.status_crafted'), icon: '❖', sub: 'صياغة الأتيلييه' },
          { name: t('account.status_qa'), icon: '★', sub: 'فحص العيار والألماس' },
          { name: t('account.status_shipped'), icon: '✈', sub: 'شحن مصفح ومؤمن' },
          { name: t('account.status_delivered'), icon: '✓', sub: 'تم التسليم للمقتني' }
        ];
        tabHTML = orders.length === 0
          ? `<div class="order-card"><p style="color:#737373;">${t('account.no_orders_yet')}</p></div>`
          : orders.map(o => {
              const dateStr = new Date(o.createdAt).toLocaleDateString(window.nicheI18n?.getLanguage() === 'ar' ? 'ar-EG' : 'en-US', { year:'numeric', month:'short', day:'numeric' });
              const stepIdx = o.stepIndex !== undefined ? Math.min(Math.max(o.stepIndex, 0), stages.length - 1) : 4;
              const progressPct = ((stepIdx) / (stages.length - 1)) * 100;
              const kwdPrice = (o.total * 0.308).toFixed(3);

              return `
                <div class="order-card">
                  <div style="display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; gap:12px; padding-bottom:14px; border-bottom:1px solid #f0ede6;">
                    <div>
                      <div style="display:flex; align-items:center; gap:8px;">
                        <span class="eyebrow" style="font-weight:700; color:#1b1b1b;">#${o.orderNumber}</span>
                        <span class="tracker-stage-badge">${o.status}</span>
                      </div>
                      <div style="font-size:12px; color:#737373; margin-top:3px;">
                        ${t('account.order_date')}: ${dateStr} &bull; ${o.paymentMethod || 'بطاقة ائتمانية (مشفرة)'}
                      </div>
                    </div>
                    <div style="text-align:right;">
                      <div class="serif" style="font-size:22px; font-weight:700; direction:ltr; display:inline-block; color:#181715;">
                        $${o.total.toFixed(2)}
                      </div>
                      <div style="font-size:12px; color:#c59b3f; font-weight:600;">
                        ${kwdPrice} د.ك KWD
                      </div>
                    </div>
                  </div>

                  <!-- Luxury Concierge Progress Tracker -->
                  <div class="luxury-tracker-card">
                    <div class="tracker-header-row">
                      <div class="tracker-stage-headline">
                        <span style="color:#c59b3f;">✦</span>
                        <span>مرحلة الصياغة الحالية: <strong>${stages[stepIdx].name}</strong></span>
                      </div>
                      <span style="font-size:11px; color:#787268;">تحديث الأتيلييه المباشر</span>
                    </div>

                    <div class="tracker-timeline">
                      <div class="tracker-timeline-line"></div>
                      <div class="tracker-timeline-progress" style="width: ${progressPct}%;"></div>

                      ${stages.map((st, idx) => {
                        const isDone = idx < stepIdx;
                        const isCurrent = idx === stepIdx;
                        const nodeClass = isDone ? 'completed' : isCurrent ? 'current' : '';
                        return `
                          <div class="tracker-node ${nodeClass}">
                            <div class="tracker-node-circle">
                              ${isDone ? '✓' : st.icon}
                            </div>
                            <div class="tracker-node-label">${st.name}</div>
                            <div class="tracker-node-status">
                              ${isDone ? 'مكتمل' : isCurrent ? 'جاري العمل' : 'قيد الانتظار'}
                            </div>
                          </div>
                        `;
                      }).join('')}
                    </div>
                  </div>

                  <div style="display:flex; flex-direction:column; gap:12px; margin-top:16px;">
                    ${o.items.map((it, idx) => {
                      const metalKey = it.metal || 'yellow';
                      const metalName = t('common.' + (metalKey === 'yellow' ? 'yellow_gold' : metalKey === 'silver' ? 'sterling_silver' : 'rose_gold'));
                      return `
                        <div style="display:flex; gap:14px; align-items:center; background:#faf9f7; padding:12px 14px; border-radius:8px; border:1px solid #f0ede6;">
                          <img src="${it.image}" alt="" style="width:64px; height:64px; object-fit:contain; background:#ffffff; border-radius:6px; padding:4px; border:1px solid #e8e3d8;">
                          <div style="flex:1;">
                            <div style="font-size:14px; font-weight:700; color:#181715;">${it.title} &times; ${it.qty}</div>
                            <div style="font-size:11.5px; color:#737373; margin-top:2px;">
                              ${metalName}${it.size ? ' &bull; ' + t('wishlist.size_label') + ' ' + it.size : ''}
                            </div>
                            ${it.type === 'custom-bangle' ? `
                              <div style="font-size:11px; color:#8b661d; margin-top:4px; line-height:1.4;">
                                ✦ <strong>${t('wishlist.front_track_label', { n: (it.frontCharms || []).length })}:</strong> ${(it.frontCharms || []).map(c => c.title).join(', ') || t('wishlist.none')}<br>
                                ✦ <strong>${t('wishlist.back_track_label', { n: (it.backCharms || []).length })}:</strong> ${(it.backCharms || []).map(c => c.title).join(', ') || t('wishlist.none')}
                                ${it.engraving ? `<br>✦ <strong>نقش الأتيلييه:</strong> “${it.engraving}”` : ''}
                              </div>
                            ` : ''}
                          </div>
                          <div style="display:flex; flex-direction:column; gap:6px;">
                            <button class="btn btn-outline btn-sm" onclick="reorderItem('${o.orderNumber}', ${idx})">${t('common.add_to_bag')}</button>
                            ${it.type === 'custom-bangle' ? `
                              <a href="/{{ app()->getLocale() ?: 'ar' }}/atelier" class="btn btn-ghost btn-sm" style="font-size:11px; text-align:center;">عرض في 3D</a>
                            ` : ''}
                          </div>
                        </div>
                      `;
                    }).join('')}
                  </div>
                </div>
              `;
            }).join('');
      } else {
        tabHTML = `
          <div class="profile-card">
            <h2 class="serif" style="font-size:28px; margin-bottom:18px;">${t('account.profile_heading')}</h2>
            <form id="profileForm">
              <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:14px;">
                <div>
                  <label style="font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">${t('checkout.full_name')}</label>
                  <input type="text" id="profName" class="p-input" value="${user.fullName || ''}" required>
                </div>
                <div>
                  <label style="font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">${t('account.email')}</label>
                  <input type="email" id="profEmail" class="p-input" value="${user.email || ''}" required>
                </div>
              </div>
              <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:14px;">
                <div>
                  <label style="font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">${t('checkout.phone')}</label>
                  <input type="text" id="profPhone" class="p-input" value="${user.phone || ''}">
                </div>
                <div>
                  <label style="font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">${t('checkout.country')}</label>
                  <input type="text" id="profCountry" class="p-input" value="${user.address?.country || ''}">
                </div>
              </div>
              <div style="margin-bottom:14px;">
                <label style="font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">${t('checkout.street')}</label>
                <input type="text" id="profStreet" class="p-input" value="${user.address?.street || ''}">
              </div>
              <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:20px;">
                <div>
                  <label style="font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">${t('checkout.city')}</label>
                  <input type="text" id="profCity" class="p-input" value="${user.address?.city || ''}">
                </div>
                <div>
                  <label style="font-size:10px; font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">${t('checkout.postal')}</label>
                  <input type="text" id="profPostal" class="p-input" value="${user.address?.postal || ''}">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">${t('account.save_profile')}</button>
            </form>
          </div>
        `;
      }

      root.innerHTML = `
        <section class="account-header-banner">
          <div class="container" style="display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; gap:16px;">
            <div>
              <span class="eyebrow">${t('account.header_eyebrow')}</span>
              <h1 class="section-heading mt-1">${user.fullName}</h1>
              <p style="font-size:12.5px; color:#666;">${user.email} &bull; ${orders.length} ${t('account.items')} &bull; ${wishCount} ${t('nav.wishlist')}</p>
            </div>
            <div style="display:flex; gap:10px;">
              <a href="/{{ app()->getLocale() ?: 'ar' }}/wishlist" class="btn btn-outline btn-sm">${t('nav.wishlist')} (${wishCount})</a>
              <button class="btn btn-ghost btn-sm" onclick="EP_STORE.signOut(); EP_UI.toast('${t('account.sign_out')}');">${t('account.sign_out')}</button>
            </div>
          </div>
        </section>

        <section class="container" style="padding-bottom:60px;">
          <div class="account-tabs">
            <button class="acct-tab-btn ${currentTab === 'orders' ? 'active' : ''}" onclick="setAcctTab('orders')">${t('account.tab_orders', { n: orders.length })}</button>
            <button class="acct-tab-btn ${currentTab === 'profile' ? 'active' : ''}" onclick="setAcctTab('profile')">${t('account.tab_profile')}</button>
          </div>
          ${tabHTML}
        </section>
      `;

      const pf = document.getElementById('profileForm');
      if (pf) {
        pf.addEventListener('submit', (e) => {
          e.preventDefault();
          window.EP_STORE.updateUserProfile({
            fullName: document.getElementById('profName').value.trim(),
            email: document.getElementById('profEmail').value.trim(),
            phone: document.getElementById('profPhone').value.trim(),
            address: {
              street: document.getElementById('profStreet').value.trim(),
              city: document.getElementById('profCity').value.trim(),
              country: document.getElementById('profCountry').value.trim(),
              postal: document.getElementById('profPostal').value.trim()
            }
          });
          window.EP_UI.toast(t('account.profile_saved'));
        });
      }
    }

    window.addEventListener('niche:languageChange', renderAccount);
    document.addEventListener('DOMContentLoaded', () => {
      renderAccount();
      window.EP_STORE.subscribe(renderAccount);
    });
  </script>
</body>
</html>

