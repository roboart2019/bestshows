// Best Shows — Membership Auth (localStorage-based prototype)
// Replace with server-side auth in production

const Auth = (() => {
  const USERS_KEY = 'bestshows2_users';
  const SESSION_KEY = 'bestshows2_session';
  const RATINGS_KEY = 'bestshows2_ratings';
  const WATCHLIST_KEY = 'bestshows2_watchlist';

  function getUsers() {
    return JSON.parse(localStorage.getItem(USERS_KEY) || '{}');
  }

  function saveUsers(users) {
    localStorage.setItem(USERS_KEY, JSON.stringify(users));
  }

  function getSession() {
    return JSON.parse(localStorage.getItem(SESSION_KEY) || 'null');
  }

  function saveSession(user) {
    localStorage.setItem(SESSION_KEY, JSON.stringify(user));
  }

  function clearSession() {
    localStorage.removeItem(SESSION_KEY);
  }

  function getRatings() {
    return JSON.parse(localStorage.getItem(RATINGS_KEY) || '{}');
  }

  function saveRatings(ratings) {
    localStorage.setItem(RATINGS_KEY, JSON.stringify(ratings));
  }

  return {
    register(username, email, password) {
      if (!username || !email || !password) return { ok: false, error: 'All fields required.' };
      if (password.length < 6) return { ok: false, error: 'Password must be at least 6 characters.' };
      const users = getUsers();
      if (users[email]) return { ok: false, error: 'An account with that email already exists.' };
      const user = { username, email, joined: new Date().toISOString() };
      // Store hashed-ish password (demo only — not real security)
      users[email] = { ...user, pw: btoa(password) };
      saveUsers(users);
      saveSession(user);
      return { ok: true, user };
    },

    login(email, password) {
      if (!email || !password) return { ok: false, error: 'Email and password required.' };
      const users = getUsers();
      const stored = users[email];
      if (!stored || stored.pw !== btoa(password)) return { ok: false, error: 'Incorrect email or password.' };
      const user = { username: stored.username, email: stored.email, joined: stored.joined };
      saveSession(user);
      return { ok: true, user };
    },

    logout() {
      clearSession();
    },

    currentUser() {
      return getSession();
    },

    isLoggedIn() {
      return !!getSession();
    },

    // Rating: members rate shows 1–10; stored per user+show
    rateShow(showId, score) {
      const user = getSession();
      if (!user) return { ok: false, error: 'Must be logged in to rate.' };
      if (score < 1 || score > 10) return { ok: false, error: 'Rating must be 1–10.' };
      const ratings = getRatings();
      if (!ratings[showId]) ratings[showId] = {};
      ratings[showId][user.email] = { score, date: new Date().toISOString() };
      saveRatings(ratings);
      return { ok: true };
    },

    getShowRatings(showId) {
      const ratings = getRatings();
      const showRatings = ratings[showId] || {};
      const scores = Object.values(showRatings).map(r => r.score);
      if (!scores.length) return { count: 0, average: null };
      const average = (scores.reduce((a, b) => a + b, 0) / scores.length).toFixed(1);
      return { count: scores.length, average: parseFloat(average) };
    },

    getUserRating(showId) {
      const user = getSession();
      if (!user) return null;
      const ratings = getRatings();
      return ratings[showId]?.[user.email]?.score || null;
    },

    getAllUserRatings() {
      const user = getSession();
      if (!user) return {};
      const ratings = getRatings();
      const result = {};
      for (const [showId, userRatings] of Object.entries(ratings)) {
        if (userRatings[user.email]) {
          result[showId] = userRatings[user.email].score;
        }
      }
      return result;
    },

    // Watchlist
    getWatchlist() {
      const user = getSession();
      if (!user) return [];
      const all = JSON.parse(localStorage.getItem(WATCHLIST_KEY) || '{}');
      return all[user.email] || [];
    },

    addToWatchlist(showId) {
      const user = getSession();
      if (!user) return { ok: false, error: 'Must be logged in.' };
      const all = JSON.parse(localStorage.getItem(WATCHLIST_KEY) || '{}');
      if (!all[user.email]) all[user.email] = [];
      if (!all[user.email].includes(showId)) all[user.email].push(showId);
      localStorage.setItem(WATCHLIST_KEY, JSON.stringify(all));
      return { ok: true };
    },

    removeFromWatchlist(showId) {
      const user = getSession();
      if (!user) return { ok: false, error: 'Must be logged in.' };
      const all = JSON.parse(localStorage.getItem(WATCHLIST_KEY) || '{}');
      if (all[user.email]) {
        all[user.email] = all[user.email].filter(id => id !== showId);
      }
      localStorage.setItem(WATCHLIST_KEY, JSON.stringify(all));
      return { ok: true };
    },

    isOnWatchlist(showId) {
      return this.getWatchlist().includes(showId);
    }
  };
})();

// Update navbar based on auth state
function updateNavAuth() {
  const user = Auth.currentUser();
  const navMenu = document.querySelector('.nav-menu');
  if (!navMenu) return;

  const existingAuthItems = navMenu.querySelectorAll('.nav-auth');
  existingAuthItems.forEach(el => el.remove());

  const root = navMenu.closest('nav')?.dataset?.root || '';

  if (user) {
    navMenu.innerHTML += `
      <li class="nav-auth"><a href="${root}members.html">My Ratings</a></li>
      <li class="nav-auth"><a href="#" class="nav-logout" onclick="Auth.logout(); window.location.href='${root}index.html'; return false;">Logout</a></li>
    `;
  } else {
    navMenu.innerHTML += `
      <li class="nav-auth"><a href="${root}login.html" class="nav-login-btn">Login</a></li>
      <li class="nav-auth"><a href="${root}register.html" class="nav-register-btn">Join Free</a></li>
    `;
  }
}

document.addEventListener('DOMContentLoaded', updateNavAuth);
