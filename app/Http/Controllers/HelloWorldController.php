<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HelloWorldController extends Controller
{
    public function greeting(string|null $name = null): View
    {
        return view('greeting', [
            'name'  => $name ?? (Auth::check() ? Auth::user()->name : 'World'),
        ]);
    }
}
