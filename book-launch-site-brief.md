# "I Was Lost But I Found Myself" — Book Launch & Gala Dinner Website
### Design brief + build prompt for Antigravity (Stitch MCP)

---

## 1. The concept: "The Thread"

Minimalist luxury needs a visual idea to hang onto, or it just looks like every other black-and-gold event site. Here's the one-of-a-kind hook:

**A single gold thread runs through the entire site.** On the homepage it appears frayed, tangled, and broken across the hero — visually "lost." As the visitor moves from page to page (Book → Author → Event → Tickets), the thread gradually straightens and resolves into a single clean line by the time they reach the ticket confirmation — visually "found." It's the book's title, rendered as an interaction, not just a headline.

This becomes:
- A recurring SVG/canvas motif (thread as a page-transition element, section divider, and progress indicator through the ticket flow)
- A subtle cursor or scroll-linked animation (thread shifts slightly as you scroll)
- The visual through-line that makes the site feel authored rather than templated

### Visual language
- **Palette**: near-black ink (`#0B0B0A`), warm ivory/bone (`#F3EEE4`), a single accent — aged gold/champagne (`#B8935A`). No more than these three families. No stock "gala" gold-glitter gradients.
- **Type**: an editorial serif for headlines (Freight Text, Canela, or Playfair Display as fallback) paired with a clean grotesk for UI/nav (Inter or General Sans). Large type, generous line-height, lots of negative space.
- **Texture**: faint paper grain over the ink background, thin 1px gold hairlines instead of boxes/cards, no drop shadows.
- **Imagery**: real, moody, low-key lit photography (author portrait, venue). No stock-photo gala crowds.
- **Motion**: slow, deliberate — page transitions feel like turning a page or a thread pulling taut, not bouncy SaaS animation.

---

## 2. Site structure (multi-page)

```
/                   Home
/book               The Book
/author             The Author
/event              The Event (gala dinner details)
/tickets            Tickets & Booking (M-Pesa STK push flow)
/journey            Gallery / visual essay ("lost to found" moments)
/faq                FAQ
/contact            Contact
```

Shared: persistent minimal top nav (logo mark = the resolved thread), footer with quick links, social, and host contact.

### Home
- Full-bleed cinematic hero: book title treatment with the frayed-thread graphic, date (6 Oct), venue teaser, one-line hook
- Primary CTA: "Reserve your seat" → /tickets
- Secondary: brief pull-quote from the book, link to /book and /author
- Countdown to event, understated (small type, not a giant digital clock)

### The Book
- Cover art, full synopsis
- 2–3 key themes/chapters teased
- One short excerpt (framed as a pull-quote, not a wall of text)
- Where to buy a copy / bundle-with-ticket option
- Early reader praise/testimonials (if any)

### The Author
- Portrait, personal narrative (the "lost to found" journey in the author's own words)
- Quote gallery (2–3 standalone quotes as full-width moments)
- Social links

### The Event
- Date, time, venue name + embedded map
- Evening program/agenda (arrival → talk & Q&A → dinner → signing)
- Dress code
- Host/event manager info (Mike Ager)
- Sponsors/partners if applicable

### Tickets & Booking
- Ticket tiers (e.g. Standard / Standard + signed book / VIP table) — pull final pricing from the client before build
- Quantity selector, guest details form (name, email, phone)
- M-Pesa payment: phone number field → "Pay with M-Pesa" → STK push prompt sent to phone → live status ("Check your phone to complete payment…") → success/failure state
- On success: booking confirmation screen + emailed e-ticket (QR code for check-in)
- The "thread" motif here doubles as a progress indicator across the steps (details → payment → confirmed)

### Journey (Gallery)
- Photo/video essay themed around "moments of being lost and found" — behind-the-scenes, past events, or evocative imagery tied to the book's themes rather than generic party photos

### FAQ
- Dress code, parking, refund policy, book-signing logistics, what's included per ticket tier

### Contact
- Contact form, direct line to event manager, social links

---

## 3. Technical reality check: M-Pesa STK Push

Flag this clearly to Antigravity — **a pure static HTML/CSS/JS site cannot safely trigger STK push on its own.** Safaricom's Daraja API requires a server-side call (consumer key/secret must never be exposed in browser JS), so the build needs:

- A small backend/serverless layer (Node.js/Express, or a serverless function on Vercel/Netlify) that:
  1. Generates an OAuth token from Safaricom Daraja using Consumer Key/Secret
  2. Sends the STK Push request (`/mpesa/stkpush/v1/processrequest`) with BusinessShortCode, Passkey, Amount, PhoneNumber, CallBackURL
  3. Exposes a callback endpoint Safaricom hits to confirm payment
  4. Updates a simple booking record (Airtable, Google Sheet via API, or lightweight DB) and triggers the e-ticket email
- The frontend only calls this backend endpoint and polls/gets pushed the payment result — it never touches Daraja credentials directly.

This should be called out explicitly in the prompt below so Antigravity scaffolds both the static frontend and this thin backend, not just static pages.

---

## 4. Prompt to feed Antigravity (Stitch MCP)

Copy everything in the box below into Antigravity as the build prompt.

```
Build a multi-page website (not a single-page scroller) for the launch of a memoir titled
"I Was Lost But I Found Myself," paired with a ticketed gala dinner launch event on 6 October.
The site must be genuinely distinctive — minimalist luxury, editorial, not a generic
event-template look.

DESIGN CONCEPT — "The Thread":
A single gold thread is the site's visual signature. It appears frayed and tangled in the
homepage hero (representing "lost") and visually resolves into a single clean line by the
time a visitor completes a ticket booking (representing "found"). Implement this as a
recurring SVG/canvas element used in: the hero graphic, section dividers, page transitions,
and as a progress indicator through the ticket booking flow.

VISUAL LANGUAGE:
- Palette: near-black ink (#0B0B0A), warm ivory (#F3EEE4), aged gold/champagne accent
  (#B8935A). No other colors. No glitter/gradient gold — a flat, restrained metallic tone.
- Typography: editorial serif for headings (Freight Text / Canela / Playfair Display
  fallback), clean grotesk sans for UI and nav (Inter / General Sans). Generous whitespace,
  large type scale, high line-height.
- Thin 1px gold hairlines for dividers instead of boxed cards or shadows. Faint paper-grain
  texture on dark backgrounds.
- Photography should be moody, low-key lit, editorial — not stock party photos.
- Motion should be slow and deliberate: page transitions and scroll effects should feel like
  a thread pulling taut or a page turning, not bouncy SaaS-style animation.

SITE STRUCTURE (separate pages/routes, shared nav + footer):
1. Home — cinematic hero with the frayed-thread graphic, book title, event date/venue
   teaser, primary CTA to Tickets, pull-quote, secondary links to Book and Author pages,
   understated countdown to 6 Oct.
2. The Book — cover art, full synopsis, 2-3 themed teasers, one pull-quote excerpt,
   buy-a-copy/bundle-with-ticket option, testimonials.
3. The Author — portrait, personal journey narrative, standalone quote gallery, social links.
4. The Event — date/time, venue with embedded map, full evening program/agenda, dress code,
   host/event manager contact (Mike Ager), sponsor logos if provided.
5. Tickets — ticket tiers (Standard / Standard + signed book / VIP table — placeholder
   pricing, editable), quantity selector, guest details form, M-Pesa phone number field,
   "Pay with M-Pesa" trigger, live payment status state, success screen with a QR-coded
   e-ticket emailed to the guest. Use the thread motif as a visual progress indicator across
   the booking steps.
6. Journey (Gallery) — photo/video essay of "lost to found" moments, behind-the-scenes or
   evocative imagery tied to the book's themes.
7. FAQ — dress code, parking, refund policy, signing logistics, what's included per tier.
8. Contact — contact form, direct line to the event manager, social links.

TECHNICAL REQUIREMENTS:
- Frontend: static multi-page HTML/CSS/JS, fully responsive, fast-loading, accessible
  (proper contrast against the dark palette, keyboard nav, alt text).
- M-Pesa STK Push payments require a backend — do NOT attempt to call Safaricom Daraja
  directly from browser JS. Scaffold a small Node.js/Express (or serverless function)
  backend that: generates a Daraja OAuth token from a Consumer Key/Secret, sends the STK
  Push request (BusinessShortCode, Passkey, Amount, PhoneNumber, CallBackURL), exposes a
  callback endpoint for Safaricom's payment confirmation, and stores the booking (Airtable,
  Google Sheets API, or a lightweight database) before triggering a confirmation email with
  a QR-coded e-ticket. The frontend only calls this backend endpoint and reflects payment
  status back to the user — it never handles Daraja credentials directly.
- Environment variables/config should be clearly separated so real M-Pesa credentials can be
  dropped in later without code changes.
- Deliver clean, commented, production-structured code (not a single monolithic file) —
  separate pages, shared partials/components for nav and footer, a clear /backend or /api
  folder for the M-Pesa integration.
```

---

A few things worth locking down with the client (Mike Ager) before this goes to build: final ticket tier pricing, venue name/address for the map embed, and whether the M-Pesa paybill/till number and Daraja API credentials are ready to hand over.
