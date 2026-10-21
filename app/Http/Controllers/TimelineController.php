<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Timeline;

class TimelineController extends Controller
{
    public function index($sites_id)
    {
        $site = Site::query()
            ->where('status', 'aktif')
            ->findOrFail($sites_id);

        $timelines = Timeline::query()
            ->where('sites_id', $site->sites_id)
            ->orderBy('urutan')
            ->orderBy('timeline_id')
            ->get();

        return view('timeline.index', compact(
            'site',
            'timelines'
        ));
    }
}