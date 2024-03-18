<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        // $currentPageId = $request->query('page');
        $currentPageId = 'about';
        $currentLang = $request->query('lang');

        $mymenu = [
            'portfolio' => ['Portfolio'],
            'about' => ['About'],
            'cv' => ['Cv'],
            'contact' => ['Contact']
        ];

        return view('about', [
            'mymenu' => $mymenu,
            'currentPageId' => $currentPageId,
            'currentLang' => $currentLang
        ]);
    }
}
