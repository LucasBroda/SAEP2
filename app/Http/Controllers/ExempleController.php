<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExempleController extends Controller
{
    /**
     * TEST
     */
    public function main() {
        return view('exemple.exemple');
    }
}
