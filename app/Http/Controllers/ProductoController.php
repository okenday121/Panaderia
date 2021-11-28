<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        $tipoproductos = TipoProducto::all();
        $ingredientes = Ingrediente::all();

        return view('productos.index', compact(['productos', 'tipoproductos', 'ingredientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoproductos = TipoProducto::all();
        $ingredientes = Ingrediente::all();

        return view('productos.create', compact(['tipoproductos', 'ingredientes']));
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
            'precio' => 'required|integer',
            'tipoproductos' => 'required',
            'ingredientes' => 'required'
        ]);

        $producto = new Producto;
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->tipo_producto_id = $request['tipoproductos'];
        $producto->ingrediente_id = $request['ingredientes'];

        $producto->save();

        $productos = Producto::All();
        $tipoproductos = TipoProducto::All();
        $ingredientes = Ingrediente::all();

        return view('productos.index', compact(['productos','tipoproductos', 'ingredientes']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $tipoproductos = TipoProducto::All();
        $ingredientes = Ingrediente::all();

        return view('productos.show', compact(['producto','tipoproductos', 'ingredientes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $tipoproductos = TipoProducto::All();
        $ingredientes = Ingrediente::all();

        return view('productos.edit', compact(['producto','tipoproductos', 'ingredientes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|integer',
            'tipoproductos' => 'required',
            'ingredientes' => 'required'
        ]);

        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->tipo_producto_id = $request['tipoproductos'];
        $producto->ingrediente_id = $request['ingredientes'];
        $producto->save();

        $tipoproductos = TipoProducto::All();
        $ingredientes = Ingrediente::all();

        return view('productos.show', compact(['producto','tipoproductos', 'ingredientes']));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index');
    }
}
