<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Package;
use App\Models\Section;
use App\Models\Text;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index()
    {
        $stats = [
            'sections' => Section::count(),
            'images' => Image::count(),
            'texts' => Text::count(),
            'packages' => Package::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
