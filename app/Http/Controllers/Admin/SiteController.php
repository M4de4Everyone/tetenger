<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;

class SiteController extends Controller
{
    /**
     * Menampilkan seluruh situs untuk admin.
     */
    public function index()
    {
        $sites = Site::query()
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.sites.index', compact('sites'));
    }
}