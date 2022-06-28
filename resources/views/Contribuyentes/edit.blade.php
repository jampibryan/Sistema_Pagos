@extends('plantilla')

@section('titulo')

@section('nombre', 'EDITAR CONTRIBUYENTE');

@section('contenido')

    <form action="{{route('contribuyentes.update', $contribuyente)}}" method="post">
        @csrf
        
        @method('put')

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input id="codigo" name="codigo" type="text" class="form-control" tabindex="2" value="{{old('contribuyente', $contribuyente->codigo)}}"> 
        </div>
        
        <div class="mb-3">
            <label for="contribuyente" class="form-label">Contribuyente</label>
            <input id="contribuyente" name="contribuyente" type="text" class="form-control" tabindex="2" value="{{old('contribuyente', $contribuyente->contribuyente)}}">         
        </div>
       
        
        <div class="mb-3">
            <label for="vencimiento" class="form-label">Vencimiento</label>
            <input id="vencimiento" name="vencimiento" type="date" step="any" class="form-control" value="{{old('contribuyente', $contribuyente->vencimiento)}}"> 
        </div>

        <div class="mb-3">
            <label for="deuda" class="form-label">Importe</label>
            <input id="deuda" name="deuda" type="number" step="any" class="form-control" value="{{old('contribuyente', $contribuyente->deuda)}}"> 
        </div>

        <br>

        <select name="tipoImpuesto" class="form-control">
            <option disabled selected>Selecciona el plazo a pagar</option>
            <option value="Predial">Predial</option>
            <option value="Arbitrios">Arbitrios</option>
        </select>
        <br>
        
     

        <a href="{{route('contribuyentes.index')}}" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-dark">Actualizar</button>
    </form>

@endsection
