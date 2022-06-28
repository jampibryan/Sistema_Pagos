@extends('plantilla')

@section('titulo','Registro')

@section('nombre', 'REGISTRO DE CONTRIBUYENTE');

@section('contenido')

    <form action="{{ route('contribuyentes.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input id="codigo" name="codigo" type="text" class="form-control" tabindex="2"
                value="{{ old('contribuyentes') }}">
        </div>

        <div class="mb-3">
            <label for="contribuyente" class="form-label">Contribuyente</label>
            <input id="contribuyente" name="contribuyente" type="text" class="form-control" tabindex="2"
                value="{{ old('contribuyentes') }}">
        </div>

        
        <div class="mb-3">
            <label for="vencimiento" class="form-label">Vencimiento</label>
            <input id="vencimiento" name="vencimiento" type="date" step="any" class="form-control"
                value="{{ old('contribuyentes') }}">
        </div>

        <div class="mb-3">
            <label for="deuda" class="form-label">Importe</label>
            <input id="deuda" name="deuda" type="number" step="any" class="form-control"
                value="{{ old('contribuyentes') }}">
        </div>

        <br>

        <select name="tipoImpuesto" class="form-control">
            <option disabled selected>Selecciona el plazo a pagar</option>
            <option value="Predial">Predial</option>
            <option value="Arbitrios">Arbitrios</option>
        </select>
        <br>
        <a href="{{ route('principal') }}" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-dark">Crear</button>
    </form>

@endsection
