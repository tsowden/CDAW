<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // $currentPageId = $request->query('page');
        $currentPageId = 'contact';
        $currentLang = $request->query('lang');

        $mymenu = [
            'portfolio' => ['Portfolio'],
            'about' => ['About'],
            'cv' => ['Cv'],
            'contact' => ['Contact']
        ];

        return view('contact', [
            'mymenu' => $mymenu,
            'currentPageId' => $currentPageId,
            'currentLang' => $currentLang
        ]);
    }
}
