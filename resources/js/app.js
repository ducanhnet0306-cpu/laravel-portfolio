import './bootstrap';

// Reveal-on-scroll: any element with the .reveal class fades up the first time
// it enters the viewport. Cheap, dependency-free, and respects reduced motion.
document.addEventListener('DOMContentLoaded', () => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const reveals = document.querySelectorAll('.reveal');

    if (prefersReducedMotion) {
        reveals.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const io = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12 },
    );

    reveals.forEach((el) => io.observe(el));

    // Mobile nav toggle.
    const nav = document.querySelector('[data-mobile-nav]');
    const toggle = document.querySelector('[data-mobile-nav-toggle]');
    if (nav && toggle) {
        toggle.addEventListener('click', () => {
            const open = nav.classList.toggle('open');
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
        nav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                nav.classList.remove('open');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });
    }
});
