<?php

namespace App\Http\Controllers;
use App\Models\Form;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class FormController extends Controller
{
   public function index(Request $request) {
        return view('formBootstrap');
    }

   public function guardar(Request $request) {         
        //Validamos los datos
        $request->validate([
          'title' => 'required',
          'description' => 'required',        
        ]);

        $name = $request->input('name');
        $email = $request->input('email');


        $response = Http::post('http://127.0.0.1:8000/book/create', [
            'name' => $request->input("nombre"),
            'description' => $request->input("text")
        ]);


        dd($response);
        
        $responseData = $response->json();
        return $this->respondSuccess();
        
    
    }
}
