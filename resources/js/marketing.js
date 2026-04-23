const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const setupPageLoader = () => {
  const loader = document.querySelector('.page-loader');
  if (!loader) {
    document.body.classList.add('page-ready');
    return;
  }

  const hideLoader = () => {
    loader.classList.add('is-hidden');
    document.body.classList.add('page-ready');
    setTimeout(() => loader.remove(), 900);
  };

  setTimeout(hideLoader, prefersReducedMotion ? 300 : 2500);
};

const setupNav = () => {
  const nav = document.getElementById('site-nav');
  if (!nav) return;

  const update = () => {
    if (window.scrollY > 100) {
      nav.classList.add('bg-background/80', 'backdrop-blur-xl', 'border-b', 'border-primary/10');
    } else {
      nav.classList.remove('bg-background/80', 'backdrop-blur-xl', 'border-b', 'border-primary/10');
    }
  };

  update();
  window.addEventListener('scroll', update, { passive: true });
};

const setupReveals = () => {
  const revealElements = document.querySelectorAll('[data-reveal]');
  if (!revealElements.length) return;

  revealElements.forEach((el) => {
    const delay = el.getAttribute('data-delay');
    if (delay) {
      el.style.transitionDelay = `${delay}ms`;
    }
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { rootMargin: '0px 0px -10% 0px', threshold: 0.15 });

  revealElements.forEach((el) => observer.observe(el));
};

const setupCursor = () => {
  if (window.innerWidth < 768) return;

  const outer = document.querySelector('.cursor-outer');
  const inner = document.querySelector('.cursor-inner');
  if (!outer || !inner) return;

  const move = (clientX, clientY) => {
    outer.style.left = `${clientX}px`;
    outer.style.top = `${clientY}px`;
    inner.style.left = `${clientX}px`;
    inner.style.top = `${clientY}px`;
  };

  const handleHover = (isHovering) => {
    outer.classList.toggle('is-hovering', isHovering);
  };

  window.addEventListener('mousemove', (event) => move(event.clientX, event.clientY));
  document.addEventListener('mouseover', (event) => {
    const target = event.target;
    if (!(target instanceof HTMLElement)) return;
    if (
      target.tagName === 'BUTTON' ||
      target.tagName === 'A' ||
      target.closest('button') ||
      target.closest('a') ||
      target.classList.contains('group') ||
      target.classList.contains('cursor-target')
    ) {
      handleHover(true);
    }
  });

  document.addEventListener('mouseout', () => handleHover(false));
};

const setupParallax = () => {
  const layer = document.querySelector('.parallax-layer');
  if (!layer) return;

  const update = () => {
    const progress = Math.min(window.scrollY / (window.innerHeight * 1.2), 1);
    const translate = progress * 30;
    const opacity = 1 - progress * 0.7;
    layer.style.transform = `translateY(${translate}px)`;
    layer.style.opacity = `${opacity}`;
  };

  update();
  window.addEventListener('scroll', update, { passive: true });
};

const setupLuxurySlider = () => {
  const slider = document.querySelector('[data-slider="luxury"]');
  if (!slider) return;

  const slides = Array.from(slider.querySelectorAll('[data-slide]'));
  const dots = Array.from(slider.querySelectorAll('[data-dot]'));
  const prev = slider.querySelector('[data-prev]');
  const next = slider.querySelector('[data-next]');

  if (!slides.length) return;
  let index = 0;
  let timer;

  const showSlide = (nextIndex) => {
    index = (nextIndex + slides.length) % slides.length;
    slides.forEach((slide, i) => slide.classList.toggle('is-active', i === index));
    dots.forEach((dot, i) => dot.classList.toggle('is-active', i === index));
  };

  const startTimer = () => {
    stopTimer();
    timer = window.setInterval(() => showSlide(index + 1), prefersReducedMotion ? 8000 : 5000);
  };

  const stopTimer = () => {
    if (timer) window.clearInterval(timer);
  };

  prev?.addEventListener('click', () => {
    showSlide(index - 1);
    startTimer();
  });
  next?.addEventListener('click', () => {
    showSlide(index + 1);
    startTimer();
  });

  dots.forEach((dot, i) => dot.addEventListener('click', () => {
    showSlide(i);
    startTimer();
  }));

  slider.addEventListener('mouseenter', stopTimer);
  slider.addEventListener('mouseleave', startTimer);

  showSlide(0);
  startTimer();
};

const setupShowcase = () => {
  const showcase = document.querySelector('[data-slider="showcase"]');
  if (!showcase) return;

  const groups = Array.from(showcase.querySelectorAll('[data-showcase-group]'));
  const groupItems = groups.map((group) => Array.from(group.querySelectorAll('[data-showcase-item]')));
  const dots = Array.from(showcase.querySelectorAll('[data-showcase-dot]'));
  const prev = showcase.querySelector('[data-showcase-prev]');
  const next = showcase.querySelector('[data-showcase-next]');

  let index = 0;

  const show = (nextIndex) => {
    if (!groupItems.length) return;
    const total = groupItems[0].length;
    index = (nextIndex + total) % total;
    groupItems.forEach((items) => {
      items.forEach((item, i) => item.classList.toggle('is-active', i === index));
    });
    dots.forEach((dot, i) => dot.classList.toggle('is-active', i === index));
  };

  prev?.addEventListener('click', () => show(index - 1));
  next?.addEventListener('click', () => show(index + 1));
  dots.forEach((dot, i) => dot.addEventListener('click', () => show(i)));

  show(0);
};

const setupPasswordToggles = () => {
  document.querySelectorAll('[data-toggle-password]').forEach((button) => {
    button.addEventListener('click', () => {
      const targetId = button.getAttribute('data-toggle-password');
      const input = document.getElementById(targetId);
      if (!input) return;
      input.type = input.type === 'password' ? 'text' : 'password';
      button.setAttribute('data-state', input.type);
      button.textContent = input.type === 'password' ? 'Show' : 'Hide';
    });
  });
};

const setupVerificationSteps = () => {
  document.querySelectorAll('[data-verify-step]').forEach((card) => {
    card.addEventListener('mouseenter', () => {
      card.classList.add('is-active');
    });
    card.addEventListener('mouseleave', () => {
      card.classList.remove('is-active');
    });
  });
};

const setupAdminTabs = () => {
  const tabButtons = Array.from(document.querySelectorAll('[data-admin-tab]'));
  const panels = Array.from(document.querySelectorAll('[data-admin-panel]'));
  if (!tabButtons.length || !panels.length) return;

  const activate = (tabId) => {
    tabButtons.forEach((btn) => btn.classList.toggle('is-active', btn.getAttribute('data-admin-tab') === tabId));
    panels.forEach((panel) => panel.classList.toggle('hidden', panel.getAttribute('data-admin-panel') !== tabId));
  };

  tabButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      const tabId = btn.getAttribute('data-admin-tab');
      if (tabId) activate(tabId);
    });
  });

  const initial = tabButtons[0].getAttribute('data-admin-tab');
  if (initial) activate(initial);
};

const setupMobileMenu = () => {
  const menu = document.querySelector('[data-mobile-menu]');
  const overlay = document.querySelector('[data-mobile-overlay]');
  const toggles = Array.from(document.querySelectorAll('[data-mobile-toggle]'));
  if (!menu || !overlay || !toggles.length) return;

  const openMenu = () => {
    menu.classList.remove('translate-x-full');
    menu.classList.add('translate-x-0');
    overlay.classList.remove('opacity-0', 'pointer-events-none');
    overlay.classList.add('opacity-100');
    document.body.classList.add('overflow-hidden');
  };

  const closeMenu = () => {
    menu.classList.add('translate-x-full');
    menu.classList.remove('translate-x-0');
    overlay.classList.add('opacity-0', 'pointer-events-none');
    overlay.classList.remove('opacity-100');
    document.body.classList.remove('overflow-hidden');
  };

  toggles.forEach((toggle) => toggle.addEventListener('click', () => {
    if (menu.classList.contains('translate-x-full')) {
      openMenu();
    } else {
      closeMenu();
    }
  }));

  overlay.addEventListener('click', closeMenu);
  menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));

  window.addEventListener('resize', () => {
    if (window.innerWidth >= 768) {
      closeMenu();
    }
  });
};

window.addEventListener('DOMContentLoaded', () => {
  setupPageLoader();
  setupNav();
  setupReveals();
  setupCursor();
  setupParallax();
  setupLuxurySlider();
  setupShowcase();
  setupPasswordToggles();
  setupVerificationSteps();
  setupAdminTabs();
  setupMobileMenu();
});
