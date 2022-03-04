<div wire:init="loadVoter">
    <x-slot name="header">
        @if (auth()->user()->role === 'SUPERADMIN')
            <ul class="flex">
                <li class="mr-6">
                    <a class="text-blue-500 hover:text-blue-800" href="{{ route('voters.main') }}">VOTANTES</a>
                </li>
                <li class="mr-6">
                    <a class="text-blue-500 hover:text-blue-800" href="{{ route('voters.field') }}">INGRESO DE
                        PUESTOS</a>
                </li>
            </ul>
        @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Votantes') }}
            </h2>
        @endif
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="container mx-auto p-6">
                    <div class="box pt-6">
                        <div class="box-wrapper">
                            <div class="flex justify-end p-4">
                                <p>Sincelejo -> {{ $sincelejo }}</p>
                                {{-- @livewire('create-voter') --}}
                            </div>
                            {{-- <div class=" bg-white rounded flex items-center w-full p-3 shadow-sm border border-gray-200">
                                <button class="outline-none focus:outline-none"><svg class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                                <input type="search" placeholder="Buscar" wire:model="search" class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent">
                                <div class="select">
                                    <select wire:model="cant" class="text-sm outline-none focus:outline-none bg-transparent">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            @if (!$readyToLoad)
                                <div class="fa-3x text-center">
                                    <i class="fas fa-stroopwafel fa-spin"></i>
                                </div>
                            @endif
                            @if (count($voters) > 0)
                                <table class="w-full">
                                    <thead>
                                        <tr
                                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                            <th class="px-4 py-3 cursor-pointer text-gray-500"
                                                wire:click="order('firstname')">
                                                Nombre
                                                @if ($sort == 'firstname')
                                                    @if ($direction == 'asc')
                                                        <i
                                                            class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                    @else
                                                        <i
                                                            class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                    @endif
                                                @else
                                                    <i class="fas fa-sort float-right mt-1 text-gray-300"></i>
                                                @endif
                                            </th>
                                            <th class="px-4 py-3 cursor-pointer text-gray-500"
                                                wire:click="order('dni')">
                                                Cedula
                                                @if ($sort == 'dni')
                                                    @if ($direction == 'asc')
                                                        <i
                                                            class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                    @else
                                                        <i
                                                            class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                    @endif
                                                @else
                                                    <i class="fas fa-sort float-right mt-1 text-gray-300"></i>
                                                @endif
                                            </th>
                                            <th class="px-4 py-3 cursor-pointer text-gray-500"
                                                wire:click="order('phone')">
                                                Teléfono
                                                @if ($sort == 'phone')
                                                    @if ($direction == 'asc')
                                                        <i
                                                            class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                    @else
                                                        <i
                                                            class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                    @endif
                                                @else
                                                    <i class="fas fa-sort float-right mt-1 text-gray-300 "></i>
                                                @endif
                                            </th>
                                            <th class="px-4 py-3 cursor-pointer text-gray-500">
                                                Puesto
                                            </th>
                                            <th class="px-4 py-3 cursor-pointer text-gray-500">
                                                Mesa
                                            </th>
                                            <th class="px-4 py-3 cursor-pointer text-gray-500">
                                                Ciudad
                                            </th>
                                            <th class="px-4 py-3 text-gray-500">Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @foreach ($voters as $value)
                                            <tr class="text-gray-700">
                                                <td class="px-4 py-3 border">
                                                    <div class="flex items-center text-sm">
                                                        <div>
                                                            <p class="font-semibold text-black">
                                                                {{ $value->firstname }}
                                                                {{ $value->lastname }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-ms font-semibold border">{{ $value->dni }}
                                                </td>
                                                <td class="px-4 py-3 text-sm border">{{ $value->phone }}</td>
                                                <td class="px-4 py-3 text-xs border text-center">
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm text-center">
                                                        {{ $value->place }} </span>
                                                </td>
                                                <td class="px-4 py-3 text-xs border text-center">
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm text-center">
                                                        {{ $value->table }} </span>
                                                </td>
                                                <td class="px-4 py-3 text-xs border text-center">
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm text-center">
                                                        70{{ $value->city_id }} </span>
                                                </td>
                                                <td class="px-4 py-3 text-xs border text-center flex">
                                                    <a href="#" class="text-gray-400 hover:text-gray-100 ml-2"
                                                        wire:click="edit({{ $value->id }})">
                                                        <i class="material-icons-outlined text-base">edit</i>
                                                    </a>
                                                    {{-- <a href="#" class="text-gray-400 hover:text-gray-100 ml-2" wire:click="$emit('deleteSupervisor',{{ $value->id }})">
                                                        <i class="material-icons-round text-base">delete_outline</i>
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($voters->hasPages())
                                    <div class="px-6 py-3 mt-2 mb-2 mr-4 ml-4">
                                        {{ $voters->links() }}
                                    </div>
                                @endif
                            @else
                                <div class="px-6 py-4">No existe ningún registro.</div>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Edita un registro de Votante {{ $voter->firstname }} {{ $voter->lastname }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Cedula" class="text-left"></x-jet-label>
                <x-jet-input type="number" class="w-full" wire:model="voter.dni"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Puesto" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="voter.place"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Mesa De Votación" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="voter.table"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label for="city_id">{{ __('Ciudad') }}</x-jet-label>
                <select wire:model="voter.city_id"
                    class="form-select appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    name="city_id">
                    <option value="" selected>Escoje una ciudad</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="city_id"></x-jet-input-error>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit',false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="updateCall" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
</div>
