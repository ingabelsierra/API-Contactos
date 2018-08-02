<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth; 


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>Contact::all()], 200);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [ 
      'nombres' => 'required', 
      'apellidos' => 'required', 
      'direccion' => 'required', 
      'telefono' => 'required',
      
    ]);
    if ($validator->fails()) { 
      return response()->json(['error'=>$validator->errors()]);
    }
    $postArray = $request->all(); 
    //$postArray['password'] = bcrypt($postArray['password']); 
    $contact = Contact::create($postArray); 
    //$success['token'] =  $contact->createToken('LaraPassport')->accessToken; 
    $success['nombres'] =  $contact->nombres;
    return response()->json([
      'status' => 'success',
      'data' => $success,
    ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return response()->json(['success' => $contact]); 
    }

     
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ 
      'nombres' => 'required', 
      'apellidos' => 'required', 
      'direccion' => 'required', 
      'telefono' => 'required',
      
    ]);
    if ($validator->fails()) { 
      return response()->json(['error'=>$validator->errors()]);
    }
    $postArray = $request->all(); 
    $contact = Contact::find($id); 
    $contact->nombres = $request->post('nombres');
    $contact->apellidos = $request->post('apellidos');
    $contact->direccion = $request->post('direccion');
    $contact->telefono = $request->post('telefono');
    $contact->save();
    $success['nombres'] =  $contact->nombres;
    return response()->json([
      'status' => 'success',
      'data' => $success,
    ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json(['success' => $contact]);
    }
}
