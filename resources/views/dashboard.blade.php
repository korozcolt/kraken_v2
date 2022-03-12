<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
        <ul class="flex">
            <li class="mr-6">
                {{ __('Dashboard') }}
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800"
                    href="{{ route('listados.coordinators') }}">Coordinadores</a>
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800" href="{{ route('votations.index') }}">VOTACIONES</a>
            </li>
        </ul>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('dashboard')
            </div>
        </div>
    </div>
</x-app-layout>
