
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TETENGER - Digital Heritage Guide</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #26352c;
            background: #f7f8f3;
        }

        nav {
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            flex-wrap: wrap;
            gap: 12px;
        }

        nav a {
            color: #315b43;
            text-decoration: none;
            margin-right: 12px;
        }

        .hero {
            padding: 65px 7%;
            background: #e5eee3;
        }

        .hero h1 {
            font-size: clamp(32px, 5vw, 52px);
            max-width: 650px;
        }

        .hero p {
            max-width: 600px;
            line-height: 1.7;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            background: #315b43;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .content {
            padding: 35px 7%;
        }

        .sites {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }

        .site-card {
            padding: 22px;
            background: white;
            border: 1px solid #e2e7df;
            border-radius: 12px;
        }

        .site-card a {
            color: #315b43;
        }

        footer {
            padding: 24px 7%;
            background: #263d30;
            color: white;
        }
    </style>
</head>
<body>
    <nav>
        <strong>TETENGER</strong>

        <div>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('sites.index') }}">Jelajahi Situs</a>
            <a href="{{ route('login') }}">Login</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Jelajahi Warisan Budaya, Temukan Ceritanya</h1>

        <p>
            Kenali situs bersejarah di wilayah selatan melalui
            informasi sejarah, lokasi, galeri, dan cerita di balik
            setiap peninggalan budaya.
        </p>

        <a class="button" href="{{ route('sites.index') }}">
            Jelajahi Situs
        </a>
    </section>

    <main class="content">
        <h2>Situs Monumen</h2>
        <p>Temukan situs bersejarah yang ingin kamu kenali.</p>

        <div class="sites">
            @forelse ($sites as $site)
                <article class="site-card">
                    <h3>{{ $site->nama_situs }}</h3>

                    <p>
                        {{ \Illuminate\Support\Str::limit(
                            $site->deskripsi ?? 'Informasi situs belum tersedia.',
                            140
                        ) }}
                    </p>

                    <p>
                        {{ $site->alamat ?? 'Alamat belum tersedia' }}
                    </p>

                    <a href="{{ route('sites.show', $site->sites_id) }}">
                        Lihat detail →
                    </a>
                </article>
            @empty
                <p>Belum ada situs aktif yang tersedia.</p>
            @endforelse
        </div>
    </main>

    <footer>
        <strong>TETENGER</strong>
        <p>Digital Heritage Guide — mengenal dan menjaga warisan budaya.</p>
    </footer>
</body>
</html>
