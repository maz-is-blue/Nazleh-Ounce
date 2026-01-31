<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? "Nazleh's Goldsmith" }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-white">
    @yield('content')

    <script>
        (() => {
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (!prefersReducedMotion) {
                document.body.classList.add('page-ready');
            } else {
                document.body.style.opacity = '1';
            }

            const nav = document.getElementById('site-nav');
            if (nav) {
                const update = () => {
                    if (window.scrollY > 100) {
                        nav.classList.add('bg-background/80', 'backdrop-blur-xl', 'border-b', 'border-primary/10');
                    } else {
                        nav.classList.remove('bg-background/80', 'backdrop-blur-xl', 'border-b', 'border-primary/10');
                    }
                };
                update();
                window.addEventListener('scroll', update, { passive: true });
            }

            const revealElements = document.querySelectorAll('.reveal, .reveal-scale, .reveal-line');
            if (revealElements.length === 0) return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { rootMargin: '0px 0px -10% 0px', threshold: 0.15 });

            revealElements.forEach((el) => observer.observe(el));
        })();
    </script>
</body>
</html>
