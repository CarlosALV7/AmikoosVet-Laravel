<?php

namespace App\Http\Controllers\API\DatosController;

use App\Http\Requests\datoRequest;
use App\Models\Dato;
use App\Http\Controllers\ApiController;

class DatosController extends ApiController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Dato::all();
        return $this->showAll($datos);
    }

    public function show(Dato $dato)
    {
        return $this->showOne($dato);
    }

    public function update(datoRequest $request, Dato $dato)
    {
        $dato->fill($request->all());
        if ($dato->isClean()) {
            return $this->errorResponse(
                "You need to specify a different value to update",
                422
            );
        }
        $dato->save();

        return $this->showOne($dato);
    }

    public function destroy(Dato $dato)
    {
        $dato->delete();

        return $this->showOne($dato);
    }
}