<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class FrontendController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.index', compact('pasiens'));
    }

    public function dataPasien()
    {
        $pasiens = Pasien::orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.data_pasien', compact('pasiens'));
    }

    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('frontend.show', compact('pasien'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
