<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
        <ul class="flex">
            <li class="mr-6">
                <a href="{{ route('dashboard') }}"
                    class="text-blue-500 hover:text-blue-800">{{ __('Dashboard') }}</a>
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800"
                    href="{{ route('listados.coordinators') }}">Coordinadores</a>
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800" href="{{ route('votations.index') }}">VOTACIONES</a>
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800" href="{{ route('coordinators.count') }}">CONTEO</a>
            </li>
        </ul>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <div class="w-full p-6">
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Puesto</th>
                                    <th class="px-4 py-2">Votos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalizador = 0;
                                @endphp
                                @foreach ($censos as $puesto)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $puesto->puesto }}</td>
                                        <td class="border px-4 py-2"><a
                                                href="{{ route('listados.placers', $puesto->puesto) }}"
                                                target="_blank">{{ $puesto->cantidad }}</a></td>
                                        @php
                                            $totalizador = $totalizador + $puesto->cantidad;
                                        @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="border px-4 py-2">Total</td>
                                    <td class="border px-4 py-2">{{ $totalizador }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
