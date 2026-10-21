<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $site->nama_situs }} | TETENGER</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6f4;
            color: #24352c;
            line-height: 1.7;
        }

        header {
            background: #245c43;
            color: white;
            padding: 20px 7%;
        }

        header a {
            color: white;
            text-decoration: none;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .content {
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .type {
            display: inline-block;
            background: #e1eee5;
            color: #245c43;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
        }

        h2, h3 {
            color: #245c43;
        }

        .back {
            display: inline-block;
            margin-top: 24px;
            color: #245c43;
            text-decoration: none;
        }

        .coordinates {
            background: #f3f6f4;
            padding: 14px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<header>
    <h1>
        <a href="{{ route('dashboard') }}">TETENGER</a>
    </h1>
</header>

<main class="container">

    <article class="content">

        <span class="type">
            {{ $site->jenis_situs ?: 'Situs Bersejarah' }}
        </span>

        <h2>{{ $site->nama_situs }}</h2>

        <h3>Deskripsi Situs</h3>
        <p>
            {{ $site->deskripsi ?: 'Deskripsi situs belum tersedia.' }}
        </p>

        <h3>Sejarah</h3>
        <p>
            {{ $site->sejarah ?: 'Informasi sejarah belum tersedia.' }}
        </p>

        <h3>Tahun</h3>
        <p>
            {{ $site->tahun ?: 'Informasi tahun belum tersedia.' }}
        </p>

        <h3>Alamat</h3>
        <p>
            {{ $site->alamat ?: 'Informasi alamat belum tersedia.' }}
        </p>

        @if ($site->latitude !== null && $site->longitude !== null)
            <h3>Koordinat Lokasi</h3>

            <div class="coordinates">
                <p>
                    <strong>Latitude:</strong>
                    {{ $site->latitude }}
                </p>

                <p>
                    <strong>Longitude:</strong>
                    {{ $site->longitude }}
                </p>
            </div>
        @endif

        <p>
            <a
                href="{{ route('galleries.index', $site->sites_id) }}"
                style="display:inline-block; padding:10px 15px; background:#245c43; color:white; text-decoration:none; border-radius:8px;"
            >
                Lihat Galeri Situs
            </a>
        </p>

        <a href="{{ route('sites.index') }}" class="back">
            ← Kembali ke Daftar Situs
        </a>

    </article>

</main>

</body>
</html>