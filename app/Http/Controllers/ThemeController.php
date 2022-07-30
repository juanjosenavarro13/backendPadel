<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theme;

class ThemeController extends Controller
{
    public function getThemes()
    {
        $themes = theme::all();
        return response()->json($themes);
    }
}
