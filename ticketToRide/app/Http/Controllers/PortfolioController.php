<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        // $currentPageId = $request->query('page');
        $currentPageId = 'portfolio';
        $currentLang = $request->query('lang');

        $mymenu = [
            'portfolio' => ['Portfolio'],
            'about' => ['About'],
            'cv' => ['Cv'],
            'contact' => ['Contact']
        ];

        return view('portfolio', [
            'mymenu' => $mymenu,
            'currentPageId' => $currentPageId,
            'currentLang' => $currentLang
        ]);
    }
}
