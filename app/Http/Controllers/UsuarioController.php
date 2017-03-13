<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\NuevoUsuario;
use Session;
use Redirect;
use Auth;
use Mail;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;


class UsuarioController extends Controller
{
    

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       if($request->ajax()){
            $users = User::all();
            return response()->json(compact('users'));
        }
        return view('usuario.index');
        /*
        if (Auth::check()) {

            $userAuth = Auth::user();

            if($userAuth->type == 'A'){
                $users = User::paginate(10);
                return view('usuario.index', compact('users'));
            }
        }
        return Redirect::to('/');
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        

            User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'address' => $request['address'],
            'state' => $request['state'],
            'type' => $request['type']
            ]);

            $url_redirect = '';
            if (Auth::check()) {
                 $userAuth = Auth::user();
                 if($userAuth->type == 'A'){
                    $url_redirect =  'usuario';
                 }else{
                    $url_redirect = '';
                 }
            }else{
                $url_redirect =  '';
            }

            //Mail::to($request['email'])->send(new NuevoUsuario($request['name'],$request['email']));
            //
            /*
            return response()
                    ->json([
                        "status" => "200",
                        "menssage" => "Registro creado exitosamente.",
                        "url_redirect" => $url_redirect
                    ])
                    ->header('status', 200)
                    ->header('Refresh', '1; url='.$url_redirect);
                    */
            
            return response() 
                ->json([
                "status" => "200",
                "menssage" => "Registro creado exitosamente.",
                "url_redirect" => $url_redirect
            ]);
            

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        
        $user = User::find($id);

        $user->fill($request->all());

        $user->save();

        return response() 
                ->json([
                "status" => "200",
                "menssage" => "Registro actualizado con exito"
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        User::destroy($id);
        Session::flash('message','Usuario eliminado');
       
        return response() 
                ->json([
                "status" => "200",
                "menssage" => "Usuario eliminado"
            ]);
    }
}
