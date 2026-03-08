// Mobile navigation toggle
const navToggle = document.querySelector('.nav-toggle');
const navMenu = document.querySelector('.nav-menu');

if (navToggle && navMenu) {
  navToggle.addEventListener('click', () => {
    navMenu.classList.toggle('active');
    navToggle.setAttribute('aria-expanded', navMenu.classList.contains('active'));
  });

  navMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      navMenu.classList.remove('active');
      navToggle.setAttribute('aria-expanded', 'false');
    });
  });
}

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && navMenu && navMenu.classList.contains('active')) {
    navMenu.classList.remove('active');
    navToggle && navToggle.setAttribute('aria-expanded', 'false');
  }
});

// Filter buttons on index page
document.querySelectorAll('.filter-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const filter = btn.dataset.filter;
    document.querySelectorAll('.review-card').forEach(card => {
      if (filter === 'all' || card.dataset.type === filter) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  });
});

// Contact form feedback
const contactForm = document.querySelector('.contact-form');
if (contactForm) {
  contactForm.addEventListener('submit', e => {
    e.preventDefault();
    const success = contactForm.querySelector('.form-success');
    if (success) { success.style.display = 'block'; }
    contactForm.reset();
  });
}

// ── Auto-render on review pages ──────────────────────────────────────────────
// Called after SHOW_ID and SHOWS_DATA are available (inline scripts set these).
function renderDimensionalRatings(showId) {
  const show = (window.SHOWS_DATA || []).find(s => s.id === showId);
  if (!show || !show.ratings) return;

  const reviewFooter = document.querySelector('.review-footer');
  if (!reviewFooter) return;

  const dims = [
    { key: 'story',          label: 'Story & Writing' },
    { key: 'performances',   label: 'Performances'    },
    { key: 'craft',          label: 'Direction & Craft'},
    { key: 'rewatchability', label: 'Rewatchability'  }
  ];

  const rows = dims.map(d => {
    const val = show.ratings[d.key];
    const pct = (val / 10) * 100;
    const cls = val >= 9 ? 'high' : val >= 7.5 ? 'mid' : 'low';
    return `
      <div class="rating-bar-row">
        <span class="rating-bar-label">${d.label}</span>
        <div class="rating-bar-track">
          <div class="rating-bar-fill ${cls}" style="width:${pct}%"></div>
        </div>
        <span class="rating-bar-val">${val}</span>
      </div>`;
  }).join('');

  const breakdown = document.createElement('div');
  breakdown.className = 'ratings-breakdown';
  breakdown.innerHTML = `<h4>Critic Breakdown</h4>${rows}`;
  reviewFooter.appendChild(breakdown);
}

function renderWatchlistButton(showId) {
  const ratingBox = document.getElementById('rating-box');
  if (!ratingBox) return;

  function draw() {
    const user = Auth.currentUser();
    if (!user) return;
    let btn = document.getElementById('watchlist-btn');
    if (!btn) {
      btn = document.createElement('button');
      btn.id = 'watchlist-btn';
      btn.className = 'watchlist-btn';
      ratingBox.after(btn);
    }
    const on = Auth.isOnWatchlist(showId);
    btn.className = 'watchlist-btn' + (on ? ' on-watchlist' : '');
    btn.innerHTML = on ? '&#10003; On Watchlist' : '+ Add to Watchlist';
    btn.onclick = () => {
      if (Auth.isOnWatchlist(showId)) {
        Auth.removeFromWatchlist(showId);
      } else {
        Auth.addToWatchlist(showId);
      }
      draw();
    };
  }
  draw();
}

document.addEventListener('DOMContentLoaded', () => {
  if (typeof SHOW_ID !== 'undefined') {
    renderDimensionalRatings(SHOW_ID);
    renderWatchlistButton(SHOW_ID);
  }
});
