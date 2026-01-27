<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? "Nazleh's Goldsmith" }}</title>
    <style>
        :root {
            --bg: #f7f2ea;
            --ink: #1f1b16;
            --accent: #b88b4a;
            --muted: #6c5f54;
            --card: #fffaf3;
        }
        body {
            margin: 0;
            font-family: "Georgia", serif;
            background: radial-gradient(circle at top left, #fff8e8 0%, #f4ead9 55%, #efe1cb 100%);
            color: var(--ink);
        }
        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 32px 20px 80px;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }
        a {
            color: var(--accent);
            text-decoration: none;
        }
        .card {
            background: var(--card);
            border: 1px solid #e4d5bf;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.05);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        th, td {
            text-align: left;
            padding: 10px 8px;
            border-bottom: 1px solid #e7dcc9;
        }
        .badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 999px;
            background: #ede0cc;
            color: #4d3b25;
            font-size: 12px;
        }
        .flash {
            padding: 10px 12px;
            background: #efe1cb;
            border: 1px solid #e4d5bf;
            border-radius: 8px;
            margin-bottom: 16px;
        }
        form.inline {
            display: inline;
        }
        input, select {
            padding: 8px 10px;
            border-radius: 8px;
            border: 1px solid #d9cbb8;
            margin-right: 8px;
            background: #fffdf9;
        }
        button {
            padding: 8px 14px;
            border-radius: 8px;
            border: 0;
            background: var(--accent);
            color: #fff;
            cursor: pointer;
        }
        @media (max-width: 700px) {
            header {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            table, thead, tbody, th, td, tr {
                display: block;
            }
            th {
                display: none;
            }
            td {
                padding: 6px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div>
                <strong>Nazleh's Goldsmith</strong>
                <div style="color: var(--muted); font-size: 14px;">Bar Registry</div>
            </div>
            <div>
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @endauth
            </div>
        </header>

        @if (session('status'))
            <div class="flash">{{ session('status') }}</div>
        @endif

        <div class="card">
            @yield('content')
        </div>
    </div>
</body>
</html>
