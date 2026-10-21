<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Situs | TETENGER</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6f4;
            color: #24352c;
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
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .intro {
            margin-bottom: 28px;
        }

        .intro h2 {
            color: #245c43;
            font-size: 30px;
        }

        .site-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 22px;
        }

        .site-card {
            background: white;
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
        }

        .site-card h3 {
            color: #245c43;
            margin-top: 0;
        }

        .site-type {
            display: inline-block;
            background: #e1eee5;
            color: #245c43;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .description {
            color: #59665e;
            line-height: 1.6;
        }

        .detail-button {
            display: inline-block;
            margin-top: 12px;
            padding: 10px 15px;
            background: #245c43;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .empty {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #245c43;
            text-decoration: none;
        }
    </style>
</head>

<body>

<header>
    <h1>
        <a href="{{ route('dashboard') }}">TETENGER</a>
    </h1>
    <p>Jelajahi warisan sejarah dan budaya.</p>
</header>

<main class="container">

    <div class="intro">
        <h2>Daftar Situs Bersejarah</h2>
        <p>
            Temukan informasi mengenai situs sejarah dan warisan
            budaya yang tersedia di TETENGER.
        </p>
    </div>

    @forelse ($sites as $site)

        @if ($loop->first)
            <div class="site-grid">
        @endif

        <article class="site-card">

            <span class="site-type">
                {{ $site->jenis_situs ?: 'Situs Bersejarah' }}
            </span>

            <h3>{{ $site->nama_situs }}</h3>

            <p class="description">
                {{ \Illuminate\Support\Str::limit($site->deskripsi ?? 'Informasi situs belum tersedia.', 140) }}
            </p>

            @if ($site->alamat)
                <p>
                    <strong>Alamat:</strong>
                    {{ \Illuminate\Support\Str::limit($site->alamat, 100) }}
                </p>
            @endif

            <a
                href="{{ route('sites.show', $site->sites_id) }}"
                class="detail-button"
            >
                Lihat Detail
            </a>

        </article>

        @if ($loop->last)
            </div>
        @endif

    @empty

        <div class="empty">
            <h3>Belum Ada Situs</h3>
            <p>
                Belum ada data situs berstatus aktif yang dapat ditampilkan.
            </p>
        </div>

    @endforelse

    <a href="{{ route('dashboard') }}" class="back">
        ← Kembali ke Beranda
    </a>

</main>

</body>
</html>