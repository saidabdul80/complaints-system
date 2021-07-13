<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Complaints_response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function submitForm(Request $request)
    {        
        $email= $request->get('email');

        $mode= $request->get('mode');
        $matric_number= $request->get('matric_number');
        $ctitle= $request->get('ctitle');
        $complain= $request->get('complain');
        $complainID = 'CM'.mt_rand(1,10000000000);  

        if ($mode == 0) {
            Complaint::create([
                'email'=> $email,
                'fname'=> $fname,
                'matric_number'=> $matric_number,
                'title'=> $ctitle,
                'complaints'=> $complain,
                'complaints_ID'=>$complainID
            ]);                    
            return redirect()->back()->with(['status' => $complainID]);
        }else{
            $complainID= $request->get('complaintID');            
            Complaints_response::create([
                'complaints_ID' => $complainID,
                'response'      => $complain,
                'date_time'     => date('Y-m-d'),
                'is_user'       => 1,
            ]);                    
            return redirect()->back()->with(['status' => $complainID]);
        }

    }       

}
