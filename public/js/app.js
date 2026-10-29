/**
 * All About Driver - Client Interactivity
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Mobile Menu Toggle
  const menuBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  const barsIcon = document.getElementById('menu-icon-bars');
  const closeIcon = document.getElementById('menu-icon-close');

  if (menuBtn && mobileMenu) {
    menuBtn.addEventListener('click', () => {
      const isHidden = mobileMenu.classList.contains('hidden');
      if (isHidden) {
        mobileMenu.classList.remove('hidden');
        barsIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
      } else {
        mobileMenu.classList.add('hidden');
        barsIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
      }
    });
  }

  // 2. FAQ Accordion functionality
  const faqButtons = document.querySelectorAll('.faq-toggle');
  faqButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      const container = btn.closest('.faq-item');
      const answer = container.querySelector('.faq-answer');
      const iconChevron = container.querySelector('.faq-icon-chevron');
      const iconClose = container.querySelector('.faq-icon-close');

      const isExpanded = !answer.classList.contains('hidden');

      // Close all FAQs in this container if needed, or toggle
      if (isExpanded) {
        answer.classList.add('hidden');
        if (iconChevron) iconChevron.classList.remove('hidden');
        if (iconClose) iconClose.classList.add('hidden');
      } else {
        // Close others in same group
        const parentGroup = container.closest('.faq-group');
        if (parentGroup) {
          parentGroup.querySelectorAll('.faq-item').forEach((item) => {
            const ans = item.querySelector('.faq-answer');
            const cIcon = item.querySelector('.faq-icon-chevron');
            const xIcon = item.querySelector('.faq-icon-close');
            if (ans) ans.classList.add('hidden');
            if (cIcon) cIcon.classList.remove('hidden');
            if (xIcon) xIcon.classList.add('hidden');
          });
        }
        answer.classList.remove('hidden');
        if (iconChevron) iconChevron.classList.add('hidden');
        if (iconClose) iconClose.classList.remove('hidden');
      }
    });
  });

  // 3. Category Filter on Homepage
  const filterButtons = document.querySelectorAll('.category-filter-btn');
  const featuredCards = document.querySelectorAll('.featured-guide-card');

  filterButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      const category = btn.getAttribute('data-category');

      // Update button active state
      filterButtons.forEach((b) => {
        b.className = 'category-filter-btn rounded-full px-3.5 py-2 text-xs font-bold transition bg-blue-50 text-[#0866D9] hover:bg-blue-100';
      });
      btn.className = 'category-filter-btn rounded-full px-3.5 py-2 text-xs font-bold transition bg-[#0866D9] text-white';

      // Filter articles
      featuredCards.forEach((card) => {
        const cardCat = card.getAttribute('data-category');
        if (category === 'All Guides' || cardCat === category) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }
      });
    });
  });

  // 4. Live Search Box on Homepage
  const searchInput = document.getElementById('home-search-input');
  const searchClear = document.getElementById('home-search-clear');
  const searchResultsBox = document.getElementById('home-search-results');
  const searchResultsList = document.getElementById('home-search-results-list');
  const quickTags = document.querySelectorAll('.quick-search-tag');

  if (searchInput && window.__ALL_ARTICLES__) {
    const articles = window.__ALL_ARTICLES__;

    const performSearch = (val) => {
      const q = val.trim().toLowerCase();
      if (!q) {
        if (searchClear) searchClear.classList.add('hidden');
        if (searchResultsBox) searchResultsBox.classList.add('hidden');
        return;
      }

      if (searchClear) searchClear.classList.remove('hidden');

      const matches = articles.filter((a) => {
        const text = `${a.title} ${a.description} ${a.category} ${(a.keywords || []).join(' ')}`.toLowerCase();
        return text.includes(q);
      }).slice(0, 5);

      if (matches.length > 0 && searchResultsBox && searchResultsList) {
        searchResultsList.innerHTML = matches.map((r) => `
          <a href="/troubleshooting/${encodeURIComponent(r.slug)}" class="block rounded-xl px-4 py-3 hover:bg-blue-50 transition">
            <p class="text-sm font-bold text-slate-800">${escapeHtml(r.title)}</p>
            <p class="mt-1 text-xs text-slate-500">${escapeHtml(r.category)} · ${escapeHtml(r.readTime)}</p>
          </a>
        `).join('');
        searchResultsBox.classList.remove('hidden');
      } else if (searchResultsBox && searchResultsList) {
        searchResultsList.innerHTML = `
          <div class="px-4 py-3 text-sm text-slate-500">
            No matching guides found. Try <a href="/category/troubleshooting" class="text-[#0866D9] font-semibold hover:underline">browsing all troubleshooting guides</a>.
          </div>
        `;
        searchResultsBox.classList.remove('hidden');
      }
    };

    searchInput.addEventListener('input', (e) => {
      performSearch(e.target.value);
    });

    if (searchClear) {
      searchClear.addEventListener('click', () => {
        searchInput.value = '';
        performSearch('');
        searchInput.focus();
      });
    }

    quickTags.forEach((tag) => {
      tag.addEventListener('click', () => {
        const term = tag.getAttribute('data-term') || tag.innerText.trim();
        searchInput.value = term;
        performSearch(term);
        searchInput.focus();
      });
    });

    // Close search box on outside click
    document.addEventListener('click', (e) => {
      if (!e.target.closest('#home-search-wrapper') && searchResultsBox) {
        searchResultsBox.classList.add('hidden');
      }
    });
  }

  // 5. Contact Form handling
  const contactForm = document.getElementById('contact-form');
  const contactSuccess = document.getElementById('contact-success');
  if (contactForm && contactSuccess) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      contactForm.classList.add('hidden');
      contactSuccess.classList.remove('hidden');
    });
  }
});

function escapeHtml(text) {
  const div = document.createElement('div');
  div.textContent = text;
  return div.innerHTML;
}
