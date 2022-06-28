@extends('plantilla')

@section('titulo', 'Listado');

@section('nombre', 'LISTADO DE CONTRIBUYENTES');


@section('contenido')
    <?php
    
    $fecha_actual = date('d-m-Y');
    
    $datos = calcularTiempo($contribuyente->vencimiento, $fecha_actual);
    
    $interes = calcularInteres($contribuyente->tipoImpuesto, $datos, $contribuyente->deuda);
    
    function calcularTiempo($fechaInicio, $fechaFin)
    {
        $datetime1 = date_create($fechaInicio);
        $datetime2 = date_create($fechaFin);
        $interval = date_diff($datetime1, $datetime2);
    
        $tiempo = [];
    
        if ($datetime1 < $datetime2) {
            foreach ($interval as $valor) {
                $tiempo[] = $valor;
            }
        } else {
            foreach ($interval as $valor) {
                $tiempo[] = 0;
            }
        }
        return $tiempo;
    }
    
    //    foreach($interval as $valor){
    //        $tiempo[]=$valor;
    //     }
    //     return $tiempo;
    
    function calcularInteres($dias, $datos, $monto)
    {
        $GeneralDias = $datos[0] * 12 * 30 + $datos[1] * 30 + $datos[2];
        // $operacion = 0;
        if ($dias === 'Predial') {
            $operacion = $GeneralDias * ($monto * 0.01);
        } elseif ($dias === 'Arbitrios') {
            $operacion = $GeneralDias * ($monto * 0.005);
        }
        return $operacion;
        // return $GeneralDias;
    }
    ?>


    <body>
        <table class="table table-dark table-striped mt-4">
            <thead>
                <tr>
                    <th class="text-center">Contribuyente</th>
                    <th class="text-center">Fecha Actual</th>
                    <th class="text-center">Días Vencidos</th>
                    <th class="text-center">Deuda(sin Interes)</th>
                    <th class="text-center">Intereses Generados</th>
                    <th class="text-center">Deuda Total</th>

                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <h6 class="text-center">Id del Contribuyente: {{ $contribuyente->id }}</h6>
                        <h6 class="text-center">Fecha de vencimiento: {{ $contribuyente->vencimiento }}</h6>
                        <h6 class="text-center">Código del Contribuyente: {{ $contribuyente->codigo }}</h6>
                        <h6 class="text-center">Nombres y Apellidos: {{ $contribuyente->contribuyente }}</h6>
                        <h6 class="text-center">Tipo de Impuesto: {{ $contribuyente->tipoImpuesto }}</h6>
                    </td>

                    <td class="text-center">
                        {{ $fecha_actual }}
                    </td>
                    <td class="text-center">
                        <h6>{{ $datos[0] . ' año(s)' }}</h6>
                        <h6>{{ $datos[1] . ' mes(es)' }}</h6>
                        <h6>{{ $datos[2] . ' dia(s)' }}</h6>
                        {{-- <h6>{{ }}</h6> --}}
                    </td>

                    <td class="text-center">
                        <h6>{{ 'S/. ' . $contribuyente->deuda }}</h6>
                    </td>

                    <td class="text-center">
                        <h6>{{ 'S/. ' . $interes }}</h6>
                    </td>

                    <td class="text-center">
                        <h6>{{ 'S/. ' . ($contribuyente->deuda + $interes) }}</h6>
                    </td>

                </tr>
            </tbody>
        </table>
        <a href="{{ route('contribuyentes.index') }}" class="btn btn-danger">Regresar</a>

    </body>

@endsection
