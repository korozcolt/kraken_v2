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
                                    Telefono
                                </th>
                            </thead>
                            <tbody>
                                @if ($coordinators->count() > 0)
                                    @foreach ($coordinators as $voter)
                                        <tr>
                                            <td>
                                                {{ $voter->id }}
                                            </td>
                                            <td>
                                                {{ $voter->dni }}
                                            </td>
                                            <td>
                                                <a href="{{ route('listados.voters', $voter->dni) }}"
                                                    target="_blank">{{ $voter->firstname }}
                                                    {{ $voter->lastname }}</a>
                                            </td>
                                            <td>
                                                {{ $voter->phone }}
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
