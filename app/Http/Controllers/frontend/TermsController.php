<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    public function index()
    {
        return view('frontend/terms.index');
    }
}
