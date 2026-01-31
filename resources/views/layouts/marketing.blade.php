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
        })();
    </script>
</body>
</html>
