<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Cliente\CreateClienteRequest;
use App\Http\Requests\Cliente\EditClienteRequest;
use App\Http\Requests\Cuenta\CreateCuentaRequest;
use App\Http\Controllers\Controller;

//Models
use App\Client;
use App\Address;
use App\BankAccount;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $clientes = Client::all();
        return view( 'home' ,compact('clientes') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view( 'create' );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClienteRequest $request)
    {

        $cliente = new Client();
        $cliente->nombre = $request->nombre;
        $cliente->razon_social = $request->razon_social;
        $cliente->rfc = $request->rfc;
        $cliente->save();

        $address = new Address();
        $address->calle = $request->calle;
        $address->numero = $request->numero;
        $address->estado = $request->estado;
        $address->municipio = $request->municipio;
        $address->client_id = $cliente->id;
        $address->save();


       return redirect()->route('home')->with('success','Registro guardado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $cliente = Client::find($id);
        return view( 'show' ,compact('cliente') );
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $cliente = Client::find($id);
        return view( 'edit' ,compact('cliente') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditClienteRequest $request, $id)
    {
        
        $cliente = Client::find($id);
        $cliente->nombre = $request->nombre;
        $cliente->razon_social = $request->razon_social;
        $cliente->rfc = $request->rfc;
        $cliente->save();

        $address = Address::find($cliente->id);
        $address->calle = $request->calle;
        $address->numero = $request->numero;
        $address->estado = $request->estado;
        $address->municipio = $request->municipio;
        $address->client_id = $cliente->id;
        $address->save();

       return redirect()->route('home')->with('success','Registro modificado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            
            $cliente = Client::find($id);
            $cliente->delete();

           return redirect()->route('home')->with('success','Registro Eliminado satisfactoriamente');
        
    }

    public function storeAjax(CreateCuentaRequest $request)
    {   

            $cuenta = new BankAccount();
            $cuenta->banco = $request->banco;
            $cuenta->sucursal = $request->sucursal;
            $cuenta->numero_cuenta = $request->numero_cuenta;
            $cuenta->client_id = $request->cliente_id;
            $cuenta->save();
            return response()->json($cuenta);

    }

    public function destroyAjax(Request $request, $id)
    {

            $cliente = BankAccount::findOrFail($id);
            $cliente->delete();
            return $cliente;
        
    }

}
