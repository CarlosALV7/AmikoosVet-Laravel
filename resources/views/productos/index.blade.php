@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box-open"></i> Productos
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:50%">Producto</th>
                        <th style="width:20%">Marca</th>
                        <th style="width:10%">Precio</th>
                        <th style="width:10%">Stock</th>
                        <th style="width:10%"><a class="btn btn-primary btn-sm" href="{!! route('productos.create') !!}" title="crear producto"><i class="fa fa-circle-plus"></i></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->producto }}</td>
                        <td>{{ $producto->marca }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="{!! route('productos.edit', $producto->id) !!}" title="editar producto"><i class="fa fa-edit"></i></a>
                            &nbsp;
                            <form class="d-inline" action="{!! route('productos.destroy', $producto->id) !!}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button class="btn btn-danger btn-sm" type="submit" title="borrar producto"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function(e) {
    // Registrar manejador formularios de borrado
    $('form[class="d-inline"]').submit(function(e) {
        if (confirm('¿Realmente deseas eliminar el registro?\nLa operación será irreversible')) {
            return true;// Enviar sólo cuando se confirma borrado
        } else {
            e.preventDefault(); // prevenir acción predeterminada (submit)
        }
    })
})
</script>
@endsection