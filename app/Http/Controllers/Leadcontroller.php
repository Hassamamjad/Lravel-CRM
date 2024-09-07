<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Leadrequest;
use App\Models\Lead;


class Leadcontroller extends Controller
{
    public function index() {
        
     $leads = Lead::all();
     return view('lead' , compact('leads'));
    }

    public function createLead(Request $request){

        try{
            $lead = Lead::create([
                'name'=>$request->name,
                'contact'=>$request->contact,
                'email'=>$request->email,
                'city'=>$request->city,
                'project_name'=>$request->project_name,
            ]);

            return redirect('/lead');

            // return response() ->json([
            //     'message' => 'Lead Created Successfully!',
            //     'data' => $lead,
            // ],200);
        }catch(Exception $e){
            return response() ->json([
                'message' => 'Something went wrong!',
                'error' => $e,
            ],401);
        }

        
    }
}
