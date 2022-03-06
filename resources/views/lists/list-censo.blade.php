@extends('lists.layout')
@section('content-list')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h4 class="card-title">Lista de Puestos</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Puesto de votación
                                </th>
                            </thead>
                            <tbody>
                                @if ($censos->count() > 0)
                                    @foreach ($censos as $voter)
                                        <tr>
                                            <td>
                                                {{ $voter->id }}
                                            </td>
                                            <td>
                                                <a href="{{ route('listados.tables', $voter->place) }}"
                                                    target="_blank">{{ $voter->place }}</a>
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
