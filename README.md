# All About Driver — PHP Edition

An independent printer troubleshooting resource converted from Next.js to modern, production-ready PHP. Optimized for deployment on **Vercel Serverless Functions** and compatible with any standard PHP web server (Apache, Nginx, Docker, or PHP's built-in server).

---

## 🚀 Features

- **100% PHP**: Converted all Next.js pages, routing, components, and data structures into native PHP.
- **Vercel Serverless Ready**: Uses `vercel-php@0.9.0` via `vercel.json` with dynamic URL rewrites.
- **Fast & Lightweight**: Zero Node.js runtime overhead on deployment.
- **Full Library**:
  - **45+ Detailed Troubleshooting Guides** across 9 categories (Troubleshooting, Setup, Connectivity, Print Quality, Paper Handling, Drivers & Software, Scanning, Maintenance & Care, Brand Guides).
  - **Live Search**: Autocomplete search dropdown on homepage + dedicated `/search` results page.
  - **Category Filtering**: Instant interactive filter on homepage featured guides.
  - **Accordion FAQs**: Collapsible questions & answers.
  - **Responsive Layout**: Sticky navigation, mobile drawer menu, clean typography, and Lucide SVG icons.
  - **SEO & Sitemaps**: Dynamic XML sitemap at `/sitemap.xml` and HTML sitemap at `/sitemap`.
  - **Company & Legal Pages**: `/about`, `/contact`, `/editorial-policy`, `/privacy-policy`, `/terms`, `/disclaimer`.

---

## 📁 Project Structure

```text
allaboutdriver01-PHP/
├── api/
│   └── index.php           # Main Vercel serverless entry point and router
├── includes/
│   ├── articles.php        # Articles data store, categories, and query helpers
│   ├── icons.php           # Native Lucide SVG icon renderer
│   ├── layout.php          # Shell, Header, Footer, and Meta tag generators
│   └── utils.php           # Escaping and helper functions
├── views/
│   ├── home.php            # Homepage with hero, search, issues, & quick fixes
│   ├── article.php         # Individual troubleshooting guide view
│   ├── category.php        # Category listing view
│   ├── search.php          # Search results view
│   ├── about.php           # About Us view
│   ├── contact.php         # Contact view with form handling
│   ├── disclaimer.php      # Disclaimer view
│   ├── editorial.php       # Editorial Policy view
│   ├── privacy.php         # Privacy Policy view
│   ├── terms.php           # Terms of Use view
│   ├── sitemap.php         # HTML Sitemap view
│   ├── sitemap-xml.php     # XML Sitemap for search engines (/sitemap.xml)
│   └── 404.php             # Custom 404 Not Found view
├── public/
│   ├── css/style.css       # Custom styles matching original design system
│   ├── js/app.js           # Client-side interactivity (mobile menu, search, accordions)
│   ├── printer-wifi-setup.png
│   ├── print-quality-guide.png
│   ├── printer-guide-hero.png
│   └── icon.svg, etc.      # Brand assets & favicons
├── index.php               # Root entry point proxy for Apache/standard hosts
├── router.php              # Local PHP development server router
├── vercel.json             # Vercel deployment configuration
└── .htaccess               # Apache rewrite rules
```

---

## 💻 Local Development

To run the application locally, you only need PHP 8.0+ installed:

```bash
php -S localhost:8000 router.php
```

Then visit [http://localhost:8000](http://localhost:8000) in your browser.

---

## ☁️ Deploying to Vercel

1. **Push your code to GitHub / GitLab / Bitbucket** or use the Vercel CLI:
   ```bash
   vercel
   ```
2. **Framework Preset**: In Vercel, leave the Framework Preset as **Other** (configured automatically by `"framework": null` in `vercel.json`).
3. **Build Command**: None (leave empty).
4. **Output Directory**: None (leave empty).

Vercel will detect `vercel.json` and deploy `api/index.php` using the `vercel-php@0.9.0` serverless runtime.
