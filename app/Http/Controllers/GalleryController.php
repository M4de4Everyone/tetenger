<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Site;

class GalleryController extends Controller
{
    /**
     * Menampilkan galeri suatu situs.
     */
    public function index($sites_id)
    {
        $site = Site::query()
            ->where('status', 'aktif')
            ->findOrFail($sites_id);

        $galleries = Gallery::query()
            ->where('sites_id', $site->sites_id)
            ->orderBy('urutan')
            ->orderBy('galeri_id')
            ->get();

        return view('galleries.index', compact(
            'site',
            'galleries'
        ));
    }
}