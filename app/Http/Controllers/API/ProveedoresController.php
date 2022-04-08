<?php

namespace App\Http\Controllers\API\ProveedoresController;

use App\Http\Requests\proveedorRequest;
use App\Models\Proveedor;
use App\Http\Controllers\ApiController;

class ProveedoresController extends ApiController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return $this->showAll($proveedores);
    }

    public function show(Proveedor $proveedor)
    {
        return $this->showOne($proveedor);
    }

    public function update(proveedorRequest $request, Proveedor $proveedor)
    {
        $proveedor->fill($request->all());
        if ($proveedor->isClean()) {
            return $this->errorResponse(
                "You need to specify a different value to update",
                422
            );
        }
        $proveedor->save();

        return $this->showOne($proveedor);
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return $this->showOne($proveedor);
    }
}