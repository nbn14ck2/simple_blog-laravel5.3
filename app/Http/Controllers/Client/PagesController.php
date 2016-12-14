<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return redirect()->route('articles');
    }

    public function about() {
        return view('client.pages.about');
    }
}
