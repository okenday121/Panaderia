<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoproductos = TipoProducto::all();
        return view('tipoproductos.index', compact('tipoproductos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoproductos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',          
        ]);

        $tipoproducto = new TipoProducto;
        $tipoproducto->nombre = $request->input('nombre');    

        $tipoproducto->save();

        return redirect()->route('tipoproductos.show', $tipoproducto);
        //$tipoproductos = TipoProducto::all();
        //return view('tipoproductos.index', compact('tipoproductos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoProducto  $tipoProducto
     * @return \Illuminate\Http\Response
     */
    public function show(TipoProducto $tipoproducto)
    {
        return view('tipoproductos.show', compact('tipoproducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoProducto  $tipoProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoProducto $tipoproducto)
    {
        return view('tipoproductos.edit', compact('tipoproducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoProducto  $tipoProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoProducto $tipoproducto)
    {
        $request->validate([
            'nombre' => 'required',         
        ]);
        $tipoproducto->nombre = $request->input('nombre');

        $tipoproducto->save();

        $tipoproductos = TipoProducto::all();        
        return view('tipoproductos.index', compact('tipoproductos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoProducto  $tipoProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoProducto $tipoproducto)
    {
        $tipoproducto->delete();
        return redirect()->route('tipoproductos.index');
    }
}
