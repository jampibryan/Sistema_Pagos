@extends('plantilla')

@section('titulo', 'Listado');

@section('nombre', 'LISTADO DE CONTRIBUYENTES');


@section('contenido')

    <body>
        <a href="{{ route('principal') }}">REGRESAR</a> <br>
        <a href="{{ route('listado') }}">LISTADO GENERAL</a>
        <table class="table table-dark table-striped mt-4">
            <thead>
                <td scope="col" class="text-center fs-4">ID</td>
                <td scope="col" class="text-center fs-4">Código</td>
                <td scope="col" class="text-center fs-4">Contribuyente</td>
                <td scope="col" class="text-center fs-4">Vencimiento</td>
                <td scope="col" class="text-center fs-4">Importe</td>
                <td scope="col" class="text-center fs-4">Tipo</td>
                <td scope="col" class="text-center fs-4">Acciones</td>
            </thead>
            @foreach ($contribuyentes as $contribuyente)
                <tr>
                    <td class="text-center">{{ $contribuyente->id }}</td>
                    <td class="text-center">{{ $contribuyente->codigo }}</td>
                    <td class="text-center">{{ $contribuyente->contribuyente }}</td>
                    <td class="text-center">{{ $contribuyente->vencimiento }}</td>
                    <td class="text-center">{{ $contribuyente->deuda }}</td>
                    <td class="text-center">{{ $contribuyente->tipoImpuesto }}</td>
                    <td>
                        <a href="{{ route('contribuyentes.show', $contribuyente) }}">Ver</a>
                            <a href="{{route('contribuyentes.edit', $contribuyente)}}">Editar</a>
                            <form action="{{route('contribuyentes.destroy', $contribuyente)}}" method="post">
                                @csrf
                                @method('delete')
                                <button>Eliminar</button>
                            </form>
                        </td>
                </tr>
            @endforeach

        </table>

    @endsection
