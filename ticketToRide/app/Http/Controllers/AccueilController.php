<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $currentPageId = 'accueil';
        // $currentLang = $request->query('lang');

        $mymenu = [
            'portfolio' => ['Portfolio'],
            'about' => ['About'],
            'cv' => ['Cv'],
            'contact' => ['Contact']
        ];

        return view('accueil', [
            'mymenu' => $mymenu,
            'currentPageId' => $currentPageId,
            // 'currentLang' => $currentLang
        ]);
    }
}
