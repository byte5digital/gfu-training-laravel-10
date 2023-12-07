<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HelloWorldController extends Controller
{
    public function greeting(string|null $name = null): View
    {
        return view('greeting', [
            'name'  => $name ?? 'World',
        ]);
    }
}
