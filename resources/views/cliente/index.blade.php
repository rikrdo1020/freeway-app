@extends('adminlte::page')

@section('title', 'FREEWAY - Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
<a href="clientes/create" class="btn btn-primary mb-4">CREAR</a>

<table id="tabla" class="table table-light table-striped mt-4">
<thead>
    <tr>
        <th scope="col">Cédula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Tipo de curso</th>
        <th scope="col">Pendiente</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>

<tbody>
    @foreach ($data as $element)
    <tr>
        <td>{{$element->cedula}}</td>
        <td>{{$element->nombreCompleto}}</td>
        <td>{{$element->tipo_curso}}</td>
        <td>${{$element->pendiente}}</td>
        <td>
            <form action="{{route('clientes.destroy', $element->id)}}" method="POST">
                <a href= "/clientes/{{ $element->id }}/edit" class="btn btn-info">Editar</a>
                <a href= "/contrato/{{$element->id}}" target="_blank" class="btn btn-success">Contrato</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete">Borrar</button>
            </form>
        </td>
    </tr>
    @endforeach
    
</tbody>
</table>


<style>
    .value_green{
        color:green;
    }
    .value_red{
        color:red;
    }
</style>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#tabla').DataTable();
} );
</script>
<script> 

$('.delete').click(function() {
return confirm("Are you sure you want to delete this?");
});
</script>
@stop


