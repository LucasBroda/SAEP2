<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExempleController extends Controller
{
    /**
     * TEST
     */
    public function main() {
        return view('exemple.exemple');
    }
}
