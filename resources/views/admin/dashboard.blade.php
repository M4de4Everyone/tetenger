
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | TETENGER</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }
        header {
            background: #14532d;
            color: white;
            padding: 20px 6%;
        }
        main {
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }
        .panel {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 8px #0000000d;
        }
        .notice {
            padding: 14px;
            border-radius: 8px;
            background: #dcfce7;
            color: #166534;
        }
        button {
            border: 0;
            border-radius: 8px;
            padding: 10px 16px;
            background: #166534;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>TETENGER — Admin</h1>
        <p>Panel pengelolaan sistem Digital Heritage Guide</p>
    </header>

    <main>
        <section class="panel">
            <h2>Dashboard Admin</h2>

            <p>
                Selamat datang,
                <strong>{{ auth()->user()->nama ?: auth()->user()->username }}</strong>.
            </p>

            <p>Role: {{ auth()->user()->role }}</p>

            @if (session('success'))
                <p class="notice">{{ session('success') }}</p>
            @endif

            <p>
                Halaman ini merupakan dasar dashboard admin.
                Fitur pengelolaan situs, galeri, timeline, QR,
                quiz, badge, pengguna, dan feedback akan
                diintegrasikan secara bertahap.
            </p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </section>
    </main>
</body>
</html>
