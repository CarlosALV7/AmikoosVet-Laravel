<?php

namespace App\Http\Controllers\API\ProductosController;

use App\Http\Requests\productoRequest;
use App\Models\Producto;
use App\Http\Controllers\ApiController;

class ProductosController extends ApiController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return $this->showAll($productos);
    }

    public function show(Producto $Producto)
    {
        return $this->showOne($Producto);
    }

    public function update(productoRequest $request, Producto $Producto)
    {
        $Producto->fill($request->all());
        if ($Producto->isClean()) {
            return $this->errorResponse(
                "You need to specify a different value to update",
                422
            );
        }
        $Producto->save();

        return $this->showOne($Producto);
    }

    public function destroy(Producto $Producto)
    {
        $Producto->delete();

        return $this->showOne($Producto);
    }
}