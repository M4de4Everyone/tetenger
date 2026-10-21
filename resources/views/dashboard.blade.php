@extends('layouts.app')

@section('title', 'Dashboard | TETENGER')

@section('content')

<div class="mx-auto max-w-7xl px-5 py-10 sm:px-8">

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Hero / Sambutan --}}
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-900 via-emerald-700 to-green-500 px-7 py-12 text-white shadow-xl sm:px-12 sm:py-16">

        <div class="absolute -right-16 -top-16 h-64 w-64 rounded-full bg-white opacity-10"></div>
        <div class="absolute -bottom-20 right-40 h-48 w-48 rounded-full bg-white opacity-10"></div>

        <div class="relative z-10 max-w-2xl">

            <span class="mb-5 inline-flex items-center rounded-full border border-white/30 bg-white/10 px-4 py-2 text-sm font-medium">
                🏛️ Digital Heritage Guide
            </span>

            <h1 class="text-3xl font-bold leading-tight sm:text-5xl">
                Selamat datang,
                {{ Auth::user()->nama ?: Auth::user()->username }}!
            </h1>

            <p class="mt-5 max-w-xl text-base leading-7 text-emerald-50 sm:text-lg">
                Jelajahi jejak sejarah, kenali situs warisan budaya,
                dan temukan cerita menarik di balik setiap peninggalan
                yang ada di wilayah selatan.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">

                <a href="{{ route('sites.index') }}"
                   class="inline-flex items-center rounded-xl bg-white px-6 py-3 font-semibold text-emerald-800 shadow-md transition hover:-translate-y-1 hover:bg-emerald-50">
                    Jelajahi Situs
                    <span class="ml-2">→</span>
                </a>

            </div>

        </div>
    </section>


    {{-- Informasi Pengguna --}}
    <section class="mt-8 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm sm:p-8">

        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="text-sm font-medium text-gray-500">
                    Akun yang sedang digunakan
                </p>

                <h2 class="mt-1 text-xl font-bold text-gray-800">
                    {{ Auth::user()->nama ?: Auth::user()->username }}
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </p>
            </div>

            <div>
                <span class="inline-flex rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold capitalize text-emerald-800">
                    {{ Auth::user()->role ?: 'Pengguna' }}
                </span>
            </div>

        </div>

    </section>


    {{-- Menu Fitur --}}
    <section class="mt-12">

        <div class="mb-6">
            <p class="text-sm font-semibold uppercase tracking-widest text-emerald-700">
                Eksplorasi TETENGER
            </p>

            <h2 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl">
                Temukan Warisan Budaya
            </h2>

            <p class="mt-3 max-w-2xl leading-7 text-gray-600">
                Mulai perjalananmu dengan menjelajahi situs bersejarah
                dan mengenal lebih dekat cerita di balik warisan budaya.
            </p>
        </div>


        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">


            {{-- Daftar Situs --}}
            <article class="group rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-3xl">
                    🏛️
                </div>

                <h3 class="mt-5 text-lg font-bold text-gray-900">
                    Daftar Situs
                </h3>

                <p class="mt-3 text-sm leading-6 text-gray-600">
                    Temukan berbagai situs bersejarah beserta informasi
                    dan cerita yang menyertainya.
                </p>

                <a href="{{ route('sites.index') }}"
                   class="mt-5 inline-flex items-center font-semibold text-emerald-700 hover:text-emerald-900">
                    Jelajahi Situs <span class="ml-2">→</span>
                </a>

            </article>


            {{-- Galeri --}}
            <article class="group rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-100 text-3xl">
                    📸
                </div>

                <h3 class="mt-5 text-lg font-bold text-gray-900">
                    Galeri Situs
                </h3>

                <p class="mt-3 text-sm leading-6 text-gray-600">
                    Lihat dokumentasi foto untuk mengenal tampilan
                    dan kondisi situs bersejarah.
                </p>

                <a href="{{ route('sites.index') }}"
                   class="mt-5 inline-flex items-center font-semibold text-emerald-700 hover:text-emerald-900">
                    Lihat Situs <span class="ml-2">→</span>
                </a>

            </article>


            {{-- Timeline --}}
            <article class="group rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-100 text-3xl">
                    📜
                </div>

                <h3 class="mt-5 text-lg font-bold text-gray-900">
                    Timeline Sejarah
                </h3>

                <p class="mt-3 text-sm leading-6 text-gray-600">
                    Telusuri perjalanan sejarah melalui cerita
                    dan peristiwa yang berkaitan dengan situs.
                </p>

                <a href="{{ route('sites.index') }}"
                   class="mt-5 inline-flex items-center font-semibold text-emerald-700 hover:text-emerald-900">
                    Telusuri Sejarah <span class="ml-2">→</span>
                </a>

            </article>


            {{-- Heritage Hunter --}}
            <article class="group rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-purple-100 text-3xl">
                    🗺️
                </div>

                <h3 class="mt-5 text-lg font-bold text-gray-900">
                    Heritage Hunter
                </h3>

                <p class="mt-3 text-sm leading-6 text-gray-600">
                    Kenali konsep eksplorasi situs dan penemuan
                    warisan budaya melalui TETENGER.
                </p>

                <span class="mt-5 inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                    Dalam pengembangan
                </span>

            </article>


            {{-- Badge --}}
            <article class="group rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-yellow-100 text-3xl">
                    🏆
                </div>

                <h3 class="mt-5 text-lg font-bold text-gray-900">
                    Badge & Achievement
                </h3>

                <p class="mt-3 text-sm leading-6 text-gray-600">
                    Kenali pencapaian yang dirancang untuk
                    menemani aktivitas eksplorasi pengguna.
                </p>

                <span class="mt-5 inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                    Dalam pengembangan
                </span>

            </article>


            {{-- Favorit --}}
            <article class="group rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-100 text-3xl">
                    ❤️
                </div>

                <h3 class="mt-5 text-lg font-bold text-gray-900">
                    Situs Favorit
                </h3>

                <p class="mt-3 text-sm leading-6 text-gray-600">
                    Fitur untuk menyimpan situs yang ingin
                    kamu kunjungi atau lihat kembali.
                </p>

                <span class="mt-5 inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                    Dalam pengembangan
                </span>

            </article>


            {{-- Kuis --}}
            <article class="group rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-100 text-3xl">
                    🧠
                </div>

                <h3 class="mt-5 text-lg font-bold text-gray-900">
                    Kuis Sejarah
                </h3>

                <p class="mt-3 text-sm leading-6 text-gray-600">
                    Pelajari pengetahuan sejarah melalui fitur
                    kuis yang direncanakan dalam sistem.
                </p>

                <span class="mt-5 inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                    Dalam pengembangan
                </span>

            </article>


            {{-- Profil --}}
            <article class="group rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-100 text-3xl">
                    👤
                </div>

                <h3 class="mt-5 text-lg font-bold text-gray-900">
                    Profil Pengguna
                </h3>

                <p class="mt-3 text-sm leading-6 text-gray-600">
                    Lihat informasi akun yang sedang digunakan
                    pada sistem TETENGER.
                </p>

                <a href="#profil-pengguna"
                   class="mt-5 inline-flex items-center font-semibold text-emerald-700 hover:text-emerald-900">
                    Lihat Profil <span class="ml-2">→</span>
                </a>

            </article>

        </div>

    </section>


    {{-- Bagian Profil --}}
    <section id="profil-pengguna" class="mt-12 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm sm:p-8">

        <p class="text-sm font-semibold uppercase tracking-widest text-emerald-700">
            Informasi Akun
        </p>

        <h2 class="mt-2 text-2xl font-bold text-gray-900">
            Profil Pengguna
        </h2>

        <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

            <div class="rounded-xl bg-gray-50 p-4">
                <p class="text-sm text-gray-500">Username</p>
                <p class="mt-1 font-semibold text-gray-800">
                    {{ Auth::user()->username }}
                </p>
            </div>

            <div class="rounded-xl bg-gray-50 p-4">
                <p class="text-sm text-gray-500">Nama</p>
                <p class="mt-1 font-semibold text-gray-800">
                    {{ Auth::user()->nama ?: '-' }}
                </p>
            </div>

            <div class="rounded-xl bg-gray-50 p-4">
                <p class="text-sm text-gray-500">Email</p>
                <p class="mt-1 break-all font-semibold text-gray-800">
                    {{ Auth::user()->email }}
                </p>
            </div>

            <div class="rounded-xl bg-gray-50 p-4">
                <p class="text-sm text-gray-500">Role</p>
                <p class="mt-1 font-semibold capitalize text-gray-800">
                    {{ Auth::user()->role ?: 'Pengguna' }}
                </p>
            </div>

        </div>

    </section>

</div>

@endsection