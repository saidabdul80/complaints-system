<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use \DB;
class MessageController extends Controller
{
    function getAllMessage(Request $request){
    	return Complaint::with(['sub_complaints'=>function($query){
            $query->orderBy('id', 'DESC');
        }])->orderBy('id', 'DESC')->get();
    }

    function readMessage(Request $request){
        $id = $request->get('id');
    	$update =  Complaint::find($id);
        $update->is_read = '1';
        if ($update->save()) {        
            return true;
        }
    }


}
