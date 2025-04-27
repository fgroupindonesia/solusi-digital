(function () {
  'use strict';

  const body = document.body;
  const header = document.getElementById('header');
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');
  const scrollTopBtn = document.querySelector('.scroll-top');
  const preloader = document.getElementById('preloader');
  const navLinks = document.querySelectorAll('.navmenu a');

  let sectionPositions = [];

  function debounce(fn, delay = 15) {
    let timeout;
    return function (...args) {
      clearTimeout(timeout);
      timeout = setTimeout(() => fn.apply(this, args), delay);
    };
  }

  function hasStickyHeader() {
    return header &&
      (header.classList.contains('scroll-up-sticky') ||
        header.classList.contains('sticky-top') ||
        header.classList.contains('fixed-top'));
  }

  function toggleScrolled() {
    if (hasStickyHeader()) {
      body.classList.toggle('scrolled', window.scrollY > 100);
    }
  }

  function toggleScrollTop() {
    if (scrollTopBtn) {
      scrollTopBtn.classList.toggle('active', window.scrollY > 100);
    }
  }

  function scrollToTop(e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  function toggleMobileNav() {
    body.classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }

  function closeMobileNav() {
    if (body.classList.contains('mobile-nav-active')) {
      toggleMobileNav();
    }
  }

  function toggleDropdown(e) {
    e.preventDefault();
    const parent = e.currentTarget.parentNode;
    const sibling = parent.nextElementSibling;
    parent.classList.toggle('active');
    if (sibling) sibling.classList.toggle('dropdown-active');
    e.stopImmediatePropagation();
  }

  function handleHashScroll() {
    if (window.location.hash) {
      const target = document.querySelector(window.location.hash);
      if (target) {
        setTimeout(() => {
          const scrollMarginTop = getComputedStyle(target).scrollMarginTop || '0';
          window.scrollTo({
            top: target.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth',
          });
        }, 100);
      }
    }
  }

  function cacheSectionPositions() {
    sectionPositions = Array.from(navLinks)
      .filter(link => link.hash && document.querySelector(link.hash))
      .map(link => {
        const section = document.querySelector(link.hash);
        return {
          link,
          top: section.offsetTop,
          height: section.offsetHeight,
        };
      });
  }

  function navmenuScrollspy() {
    const position = window.scrollY + 200;
    sectionPositions.forEach(({ link, top, height }) => {
      const isActive = position >= top && position <= top + height;
      link.classList.toggle('active', isActive);
    });
  }

  function initSwiper() {
    const swipers = document.querySelectorAll('.init-swiper');
    swipers.forEach(swiperEl => {
      const configEl = swiperEl.querySelector('.swiper-config');
      if (!configEl) return;
      const config = JSON.parse(configEl.textContent.trim());

      if (swiperEl.classList.contains('swiper-tab')) {
        initSwiperWithCustomPagination(swiperEl, config);
      } else {
        new Swiper(swiperEl, config);
      }
    });
  }

  function initAOS() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }

  // === Event bindings ===

  document.addEventListener('scroll', debounce(toggleScrolled));
  document.addEventListener('scroll', debounce(toggleScrollTop));
  document.addEventListener('scroll', debounce(navmenuScrollspy));

  window.addEventListener('load', () => {
    toggleScrolled();
    toggleScrollTop();
    cacheSectionPositions();
    navmenuScrollspy();
    initAOS();
    initSwiper();
    handleHashScroll();
    preloader?.remove();
  });

  if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', scrollToTop);
  }

  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', toggleMobileNav);
  }

  navLinks.forEach(link => {
    link.addEventListener('click', closeMobileNav);
  });

  const dropdownToggles = document.querySelectorAll('.navmenu .toggle-dropdown');
  dropdownToggles.forEach(toggle => {
    toggle.addEventListener('click', toggleDropdown);
  });

  const faqToggles = document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle');
  faqToggles.forEach(el => {
    el.addEventListener('click', () => {
      el.parentNode.classList.toggle('faq-active');
    });
  });

  // === Init GLightbox ===
  GLightbox({ selector: '.glightbox' });
})();
