
@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
<script>

function suma() {
    var add = 0;
    $('#monto').each(function() {

        if ($(this).val()) {
            add = parseInt($(this).val());
            $('#monto').val(parseInt($(this).val()).toFixed(2));
        }
    });
    $('#abono').each(function() {
        if ($(this).val()) {
            if((parseInt($(this).val())) <= (parseInt($('#monto').val()))){
                add -= parseInt($(this).val());
                $('#abono').val(parseInt($(this).val()).toFixed(2));
            }
            else {
                $('#abono').val(null);
            }
            
        }
    });
    $('#pendiente').val(parseInt(add).toFixed(2));
};
</script>


<form action="/clientes/{{$data->id}}" method="POST">
@csrf
@method('PUT')
<div class="row">
    <div class="col-lg-8 me-3 mb-3">

        <div class="mb-3">
            <div class="col-4">
                <label for="" class="form-label">Nombre Completo</label>
                <input id="nombreCompleto" name= "nombreCompleto" type="text" class="form-control" tabindex="1" value="{{$data->nombreCompleto}}" required>
            </div>
        </div>
        <div class="row g-2 mb-3">
            <div class="col-4">
                <label for="" class="form-label">Cédula</label>
                <input id="cedula" name= "cedula" type="text" class="form-control" tabindex="1" value="{{$data->cedula}}" required>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Dirección</label>
            <input id="direccion" name= "direccion" type="text" class="form-control" tabindex="3" value="{{$data->direccion}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Teléfono</label>
            <input id="telefono" name= "telefono" type="text" class="form-control" tabindex="4" value="{{$data->telefono}}" required>
        </div>
        <div class="row g-3 align-items-center mb-3">
            <div class="col-auto monto">
                <label for="" class="form-label">Monto</label>
                <input id="monto" name="monto" type="number" class="form-control" placeholder="00.00" onChange="suma();" value="{{$data->monto}}" required>
            </div>
            <div class="col-auto monto">
                <label for="" class="form-label">Abono</label>
                <input id="abono" name="abono" type="number" class="form-control" placeholder="00.00" onChange="suma();" value="{{$data->abono}}">
            </div>
            
                <div class="col-auto">
                    <label for="" class="form-label">Pendiente</label>
                    <input id="pendiente" name="pendiente" type="number" class="form-control" placeholder="00.00" onChange="suma();" value="{{$data->pendiente}}" readonly>
            </div>
            
            
        </div>
        
        <div class="form-group row mb-3">
            <label for="example-date-input" class="col-4 col-form-label">Fecha de Cancelación</label>
            <div class="col-8">
                <input id="cancelacion" name="cancelacion" class="form-control" type="date" value="{{$data->cancelacion}}" >
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo de Curso de Manejo</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_curso" value="Particular" id="tipo_curso" {{ $data->tipo_curso == 'Particular' ? 'checked' : '' }}>
                
                <label class="form-check-label" for="flexRadioDefault1"  >
                    Particular
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_curso" value="Comercial" id="tipo_curso" {{ $data->tipo_curso == 'Comercial' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault2"  >
                    Comercial
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_curso" value="Moto" id="tipo_curso" {{ $data->tipo_curso == 'Moto' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault2"  >
                    Moto
                </label>
            </div>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Transmision</label>
            <div class="form-check">
            
                <input class="form-check-input" type="radio" name="tipo_transmision" value="Automática" id="tipo_transimision" {{ $data->transmision == 'Automática' ? 'checked' : '' }} >
                <label class="form-check-label" for="flexRadioDefault1" name="tipo_transmision"  >
                    Automática
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_transmision" value="Manual" id="tipo_transimision" {{ $data->transmision == 'Manual' ? 'checked' : '' }} >
                <label class="form-check-label" for="flexRadioDefault2" name="tipo_transmision"  >
                    Manual
                </label>
            </div>
        </div>

    </div>
    <div class="col-lg ">
        <div class="form-group row g-0 mb-3">
            <label for="example-date-input" class="col-3 col-form-label">Clase #1</label>
            <div class="col-5">
                <input class="form-control" type="date" value="" id="dia_clase_1">
            </div>
            <div class="col-4">
                <input class="form-control" type="time" value="" id="hora_clase_1">
            </div>
        </div>
        
        <div class="form-group row g-0 mb-3">
            <label for="example-date-input" class="col-3 col-form-label">Clase #2</label>
            <div class="col-5">
                <input class="form-control" type="date" value="" id="dia_clase_2">
            </div>
            <div class="col-4">
                <input class="form-control" type="time" value="" id="hora_clase_2">
            </div>
        </div>

        <div class="form-group row g-0 mb-3">
            <label for="example-date-input" class="col-3 col-form-label">Clase #3</label>
            <div class="col-5">
                <input class="form-control" type="date" value="" id="dia_clase_3">
            </div>
            <div class="col-4">
                <input class="form-control" type="time" value="" id="hora_clase_3">
            </div>
        </div>

        <div class="form-group row g-0 mb-3">
            <label for="example-date-input" class="col-3 col-form-label">Clase #4</label>
            <div class="col-5">
                <input class="form-control" type="date" value="" id="dia_clase_4">
            </div>
            <div class="col-4">
                <input class="form-control" type="time" value="" id="hora_clase_4">
            </div>
        </div>

        <div class="form-group row g-0 mb-3">
            <label for="example-date-input" class="col-3 col-form-label">Clase #5</label>
            <div class="col-5">
                <input class="form-control" type="date" value="" id="dia_clase_5">
            </div>
            <div class="col-4">
                <input class="form-control" type="time" value="" id="hora_clase_5">
            </div>
        </div>
        
    </div>
</div>

<a href="/clientes" class="btn btn-secondary" tabindex="5">Cancelar</a>
<button type="submit" class="btn btn-primary" tabindex="6" >Guardar</button>


</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@section('contenido')





@endsection

@section('js')
@stop