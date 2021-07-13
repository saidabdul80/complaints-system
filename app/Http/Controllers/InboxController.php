<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inboxController extends Controller
{
    
    function inbox()
    {
    	return view('inbox');
    }
}
