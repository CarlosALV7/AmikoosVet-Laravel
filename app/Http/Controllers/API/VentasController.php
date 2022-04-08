<?php

namespace App\Http\Controllers\API\VentasController;

use App\Http\Requests\ventaRequest;
use App\Models\Venta;
use App\Http\Controllers\ApiController;

class VentasController extends ApiController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();
        return $this->showAll($ventas);
    }

    public function show(Venta $venta)
    {
        return $this->showOne($venta);
    }

    public function update(ventaRequest $request, Venta $venta)
    {
        $venta->fill($request->all());
        if ($venta->isClean()) {
            return $this->errorResponse(
                "You need to specify a different value to update",
                422
            );
        }
        $venta->save();

        return $this->showOne($venta);
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();

        return $this->showOne($venta);
    }
}