<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CvController extends Controller
{
    public function index(Request $request)
    {
        // $currentPageId = $request->query('page');
        $currentPageId = 'cv';
        $currentLang = $request->query('lang');

        $mymenu = [
            'portfolio' => ['Portfolio'],
            'about' => ['About'],
            'cv' => ['Cv'],
            'contact' => ['Contact']
        ];

        return view('cv', [
            'mymenu' => $mymenu,
            'currentPageId' => $currentPageId,
            'currentLang' => $currentLang
        ]);
    }
}
