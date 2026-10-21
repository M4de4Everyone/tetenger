<?php

namespace App\Http\Controllers;

use App\Models\Site;

class SiteController extends Controller
{
        /**
     * Menampilkan halaman utama.
     */
    public function home()
    {
        $sites = Site::query()
            ->where('status', 'aktif')
            ->orderBy('nama_situs')
            ->limit(6)
            ->get();

        return view('home', compact('sites'));
    }
    /**
     * Menampilkan daftar situs.
     */
    
    /**
     * Menampilkan daftar situs dan menangani pencarian.
     */
    public function index(\Illuminate\Http\Request $request)
    {
        $keyword = trim($request->input('q', ''));

        $sites = Site::query()
            ->where('status', 'aktif')
            ->when($keyword !== '', function ($query) use ($keyword) {
                $query->where('nama_situs', 'like', '%' . $keyword . '%');
            })
            ->orderBy('nama_situs')
            ->paginate(10)
            ->withQueryString();

        return view('sites.index', compact('sites', 'keyword'));
    }


    /**
     * Menampilkan detail situs.
     */
    public function show($sites_id)
    {
        $site = Site::query()
            ->where('status', 'aktif')
            ->findOrFail($sites_id);

        return view('sites.show', compact('site'));
    }
}