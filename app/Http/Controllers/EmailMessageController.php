<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailtrapMailler;
use Illuminate\Support\Facades\Mail;

class EmailMessageController extends Controller
{
    //
    public function default(Request $request)
    {

    	$fname = $request->get('fname');
		$email = $request->get('email');
		$complaints_ID = $request->get('complaints_ID');
		$title = $request->get('title');
		$required = $request->get('required');	
		session(['ufname' => $fname]);
		session(['complaints_ID'=> $complaints_ID]);
		session(['title'=> $title]);
		session(['required'=> $required]);
    	Mail::to($email)->send(new MailtrapMailler());
	    return true;
    }
}
