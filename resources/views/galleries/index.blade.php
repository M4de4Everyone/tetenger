<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri {{ $site->nama_situs }} | TETENGER</title>

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

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 22px;
            margin-top: 28px;
        }

        .gallery-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
        }

        .gallery-card img {
            display: block;
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: #e5e7eb;
        }

        .caption {
            padding: 18px;
            line-height: 1.6;
        }

        .empty {
            background: white;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            margin-top: 25px;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
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
    <p>Galeri Warisan Sejarah dan Budaya</p>
</header>

<main class="container">

    <h2>Galeri {{ $site->nama_situs }}</h2>

    <p>
        Dokumentasi foto yang berkaitan dengan situs ini.
    </p>

    @forelse ($galleries as $gallery)

        @if ($loop->first)
            <div class="gallery-grid">
        @endif

        <article class="gallery-card">

            @if ($gallery->foto)
                <img
                    src="{{ asset('storage/' . ltrim($gallery->foto, '/')) }}"
                    alt="{{ $gallery->keterangan ?: $site->nama_situs }}"
                    loading="lazy"
                >
            @else
                <div style="height:220px; display:flex; align-items:center; justify-content:center; background:#e5e7eb;">
                    Foto belum tersedia
                </div>
            @endif

            <div class="caption">
                {{ $gallery->keterangan ?: 'Tidak ada keterangan foto.' }}
            </div>

        </article>

        @if ($loop->last)
            </div>
        @endif

    @empty

        <div class="empty">
            <h3>Belum Ada Foto</h3>
            <p>
                Belum ada foto yang ditambahkan untuk situs ini.
            </p>
        </div>

    @endforelse

    <a
        href="{{ route('sites.show', $site->sites_id) }}"
        class="back"
    >
        ← Kembali ke Detail Situs
    </a>

</main>

</body>
</html>