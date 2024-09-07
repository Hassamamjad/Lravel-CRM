<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Clientrequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index() {
        $clients = client::all();
        return view('client' , compact('clients'));
    }

    public function createClient(Request $request){

        try{
         $clients = Client::create([
           'name' => $request->name,
           'email' => $request->email,
           'contact' => $request->contact,
           'date' => $request->date,
           'city' => $request->city,
           'status' => $request->status,

         ]);

         return redirect('/client');

        }catch(Exception $e){
            return response() ->json([
                'message' => 'Something went wrong!',
                'error' => $e,
            ],401);
        }
    }
}
