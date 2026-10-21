<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | TETENGER</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6f4;
            color: #24352c;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        .card {
            background: white;
            width: 100%;
            max-width: 430px;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .brand {
            text-align: center;
            margin-bottom: 28px;
        }

        .brand h1 {
            color: #245c43;
            letter-spacing: 2px;
        }

        .brand p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.5;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 7px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #245c43;
        }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #245c43;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background: #194832;
        }

        .footer {
            margin-top: 22px;
            text-align: center;
            font-size: 14px;
        }

        a {
            color: #245c43;
            font-weight: bold;
            text-decoration: none;
        }

        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .error {
            color: #991b1b;
            background: #fee2e2;
        }

        .success {
            color: #166534;
            background: #dcfce7;
        }

        .error-list {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <div class="card">

        <div class="brand">
            <h1>TETENGER</h1>
            <p>
                Temukan cerita, sejarah, dan warisan
                budaya di wilayah selatan.
            </p>
            <h2>Selamat Datang</h2>
        </div>

        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert error">
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="email"
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
            >

            <button type="submit">Login</button>
        </form>

        <div class="footer">
            Belum memiliki akun?
            <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>

    </div>
</body>
</html>