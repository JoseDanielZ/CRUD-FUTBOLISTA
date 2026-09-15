<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CRUD Futbolistas LaLiga')</title>
    <style>
        :root {
            --laliga-red: #ee3524;
            --laliga-navy: #0a1e3c;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background: #f4f4f4;
            color: var(--laliga-navy);
        }
        header {
            background: var(--laliga-red);
            color: #fff;
            padding: 16px 24px;
        }
        header h1 {
            margin: 0;
            font-size: 22px;
        }
        main {
            padding: 24px;
        }
        a.btn, button {
            display: inline-block;
            background: var(--laliga-red);
            color: #fff;
            border: none;
            padding: 8px 14px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }
        a.btn.secondary, button.secondary {
            background: var(--laliga-navy);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-top: 16px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px 10px;
            text-align: left;
        }
        th {
            background: var(--laliga-navy);
            color: #fff;
        }
        form.inline {
            display: inline;
        }
        form.card {
            background: #fff;
            padding: 20px;
            border-radius: 6px;
            max-width: 420px;
            margin-top: 16px;
        }
        form.card input, form.card select {
            display: block;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 12px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header>
        <h1>&#9917; CRUD Futbolistas &mdash; LaLiga</h1>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
