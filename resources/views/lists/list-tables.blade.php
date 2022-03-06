@extends('lists.layout')
@section('content-list')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h4 class="card-title">Lista de Coordinadores</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Cedula
                                </th>
                                <th>
                                    Nombre Completo
                                </th>
                                <th>
                                    Puesto de Votación
                                </th>
                                <th>
                                    Mesa
                                </th>
                                <th>
                                    Lider
                                </th>
                                <th>
                                    Coordinador
                                </th>
                            </thead>
                            <tbody>
                                @if ($voter->count() > 0)
                                    @foreach ($voter as $value)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $value->dni }}
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">
                                            <h4 class="text-center">No hay registros</h4>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
