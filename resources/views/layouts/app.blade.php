<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'TETENGER - Digital Heritage Guide')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(
                135deg,
                #065f46 0%,
                #10b981 100%
            );
        }

        .pattern-bg {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .situs-card {
            transition: all 0.3s ease;
        }

        .situs-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen">

    {{-- NAVBAR --}}
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3
                    flex items-center justify-between">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-2">

                <span class="text-2xl">🏛️</span>

                <span class="font-bold text-xl text-emerald-700">
                    TETENGER
                </span>
            </a>

            <div class="hidden md:flex items-center gap-6 text-sm">

                <a href="{{ route('dashboard') }}"
                   class="hover:text-emerald-600 transition">
                    Beranda
                </a>

                <a href="{{ route('sites.index') }}"
                   class="hover:text-emerald-600 transition">
                    Situs
                </a>

                @auth
                    <span class="text-gray-500">
                        Halo, {{ Auth::user()->username }}
                    </span>

                    <form action="{{ route('logout') }}"
                          method="POST">
                        @csrf

                        <button type="submit"
                                class="bg-emerald-600 text-white
                                       px-4 py-2 rounded-lg
                                       hover:bg-emerald-700 transition">
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="bg-emerald-600 text-white
                              px-4 py-2 rounded-lg
                              hover:bg-emerald-700 transition">
                        Login
                    </a>
                @endauth

            </div>

        </div>
    </nav>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-5">
            <div class="bg-green-100 text-green-800
                        border border-green-200
                        rounded-lg p-4">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="max-w-7xl mx-auto px-4 mt-5">
            <div class="bg-red-100 text-red-800
                        border border-red-200
                        rounded-lg p-4">
                {{ session('error') }}
            </div>
        </div>
    @endif

    {{-- KONTEN HALAMAN --}}
    <main class="fade-in">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 py-6 text-center">

            <p class="font-bold text-emerald-700">
                🏛️ TETENGER
            </p>

            <p class="text-sm text-gray-500 mt-2">
                Digital Heritage Guide — Jelajahi dan kenali
                warisan budaya.
            </p>

        </div>
    </footer>

    @stack('scripts')

</body>
</html>