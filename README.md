# NICH JEWELRY — Fine Jewelry Storefront & 3D Glider Bangle Studio

A complete interactive luxury jewelry e-commerce storefront and real-time 3D WebGL Glider Charm Bangle Studio, powered by a persistent `localStorage` dummy database (`EP_DB` & `EP_STORE`).

---

## Pages & Architecture

- **`index.html`** — Brand Landing Page: Hero editorial, interactive metal showcase spotlight (`18K Yellow Gold`, `925 Sterling Silver`, `18K Rose Gold`), best-seller product cards, cutout charm collection strip, craftsmanship section, testimonials, and VIP newsletter signup.
- **`collections.html`** — Filterable Catalog & Search: Category pills, metal filter pills, live search bar, sorting, and URL query hydration (`?cat=...&metal=...&search=...`).
- **`product.html`** — Dynamic Product Detail Page (`?id=...`): Image gallery synced to metal selection, size selector (`XS`–`L`), A–Z initial letter selector for initial charms, personalized gift note, shipping/care accordions, live customer review submission, and related items.
- **`customizer.html`** — Interactive 3D Glider Bangle Studio:
  - Procedural CAD bangle mesh (~57mm x 48mm) with dual front & back recessed glider tracks, clasp knuckles, hinge pins, and hallmark stamps.
  - Standalone 3D cutout charm meshes (`assets/charms/*.png` alpha-extracted cleanly without frames).
  - Direct pointer raycast drag-and-drop along the ellipse perimeter, 90° step rotation, swap/remove controls, 3-step guided customization flow (`Step 1 Front` -> `Step 2 Back` -> `Step 3 Review`), Save to Wishlist (`?designId=...`), Add To Bag (`?cartUid=...`), and binary `.GLB` export.
- **`wishlist.html`** — Wishlist & Saved 3D Designs Vault: Saved catalog products and custom 3D bangles with miniature front/back charm token previews, `Edit in 3D`, and `Move to Bag`.
- **`checkout.html`** — Multi-step Checkout & Order Confirmation Receipt: Collector address pre-fill, Insured Standard vs. DHL Express shipping, Credit Card / Apple Pay / Cash on Delivery tabs, promo code validation, and printable receipt.
- **`account.html`** — Collector Account & Order Tracking: Demo sign-in/out, 5-stage order progress tracker, `Reorder` action, and editable shipping profile.
- **`about.html`** — Atelier Story, Care & Wrist Sizing Guide: Interactive wrist circumference slider (`13.0–19.0 cm`) linking straight into `customizer.html?size=...`, size chart, and FAQs.

### Core Modules & Styles

- **`css/styles.css`** — Shared storefront tokens, responsive navigation header, slide-out shopping bag drawer, search modal, product cards, toasts, and footer.
- **`js/db.js`** — Seed catalog (`EP_DB`: 13 products across Bangles, Charms, Necklaces, Earrings, Rings; metal finishes; XS–L sizes; seeded reviews; initial order `#NJ-2026-4108`).
- **`js/store.js`** — Persistent `localStorage` state engine (`EP_STORE`) for Cart, Promo Discounts, Wishlist, Custom 3D Bangle saves, Orders, Profile, Reviews, and Newsletter.
- **`js/layout.js`** — Shared Header, Search Overlay, Cart Drawer, Product Card renderer, and Toast system (`EP_UI`).

---

## Demo Promo Codes

- **`NICH15`** — 15% Off Entire Order
- **`ELISE15`** — 15% Off Entire Order (Legacy alias)
- **`ATELIER20`** — 20% Off Orders $500+
- **`WELCOME50`** — $50 Off Orders $300+

---

## How to Run Locally

```bash
node server.js
```

Then open `http://localhost:8080/index.html` or `http://localhost:8080/customizer.html`.
