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
                                    Teléfono
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
                                <th>
                                    VOTO
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
                                            <td>
                                                {{ $value->firstname }} {{ $value->lastname }}
                                            </td>
                                            <td>
                                                {{ $value->phone }}
                                            </td>
                                            <td>
                                                {{ $value->place }}
                                            </td>
                                            <td>
                                                {{ $value->table }}
                                            </td>
                                            <td>
                                                {{ $value->lider_firstname }} {{ $value->lider_lastname }}
                                            </td>
                                            <td>
                                                {{ $value->coordinator_firstname }} {{ $value->coordinator_lastname }}
                                            </td>
                                            <td>
                                                @if ($value->guide == true)
                                                    <div class="badge bg-success text-wrap" style="width: 6rem;">REGISTRADO
                                                    </div>
                                                @else
                                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">NO
                                                        REGISTRADO
                                                    </div>
                                                @endif
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
