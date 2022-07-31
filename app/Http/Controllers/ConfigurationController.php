<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class ConfigurationController extends Controller
{
    public function index()
    {
        $config = Configuration::all();
        return response()->json($config);
    }
}
