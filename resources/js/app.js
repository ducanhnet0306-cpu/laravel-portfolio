import './bootstrap';

const THEME_STORAGE_KEY = 'portfolio-theme';

function syncThemeColorMeta() {
    const meta = document.querySelector('meta[name="theme-color"]');
    if (!meta) {
        return;
    }
    meta.setAttribute(
        'content',
        document.documentElement.classList.contains('dark') ? '#0f172a' : '#2563eb',
    );
}

function initThemeToggle() {
    document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const root = document.documentElement;
            const nextDark = !root.classList.contains('dark');
            root.classList.toggle('dark', nextDark);
            localStorage.setItem(THEME_STORAGE_KEY, nextDark ? 'dark' : 'light');
            syncThemeColorMeta();
        });
    });

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (localStorage.getItem(THEME_STORAGE_KEY) !== null) {
            return;
        }
        document.documentElement.classList.toggle('dark', e.matches);
        syncThemeColorMeta();
    });
}

// Reveal-on-scroll: any element with the .reveal class fades up the first time
// it enters the viewport. Cheap, dependency-free, and respects reduced motion.
document.addEventListener('DOMContentLoaded', () => {
    initThemeToggle();
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
