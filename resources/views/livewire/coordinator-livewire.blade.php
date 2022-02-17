<div wire:init="loadCoordinator">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coordinador') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="container mx-auto p-6">
                    <div class="box pt-6">
                        <div class="box-wrapper">
                            <div class="flex justify-end p-4">
                                @livewire('create-coordinator')
                            </div>
                            <div class=" bg-white rounded flex items-center w-full p-3 shadow-sm border border-gray-200">
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
                            </div>
                            </div>
                        </div>
                        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                            <div class="w-full overflow-x-auto">
                                @if(!$readyToLoad)
                                    <div class="fa-3x text-center">
                                        <i class="fas fa-stroopwafel fa-spin"></i>
                                    </div>
                                @endif
                                @if( count($coordinators) > 0)
                                    <table class="w-full">
                                        <thead>
                                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                            <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('firstname')">
                                                Nombre
                                                @if($sort == 'firstname')
                                                    @if($direction == 'asc')
                                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                    @else
                                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                    @endif
                                                @else
                                                    <i class="fas fa-sort float-right mt-1 text-gray-300"></i>
                                                @endif
                                            </th>
                                            <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('dni')">
                                                Cedula
                                                @if($sort == 'dni')
                                                    @if($direction == 'asc')
                                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                    @else
                                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                    @endif
                                                @else
                                                    <i class="fas fa-sort float-right mt-1 text-gray-300"></i>
                                                @endif
                                            </th>
                                            <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('phone')">
                                                Teléfono
                                                @if($sort == 'phone')
                                                    @if($direction == 'asc')
                                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                    @else
                                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                    @endif
                                                @else
                                                    <i class="fas fa-sort float-right mt-1 text-gray-300 "></i>
                                                @endif
                                            </th>
                                            <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('status')">
                                                Estado
                                                @if($sort == 'status')
                                                    @if($direction == 'asc')
                                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                    @else
                                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                    @endif
                                                @else
                                                    <i class="fas fa-sort float-right mt-1 text-gray-300"></i>
                                                @endif
                                            </th>
                                            <th class="px-4 py-3 text-gray-500">Tools</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                        @foreach($coordinators as $value)
                                            <tr class="text-gray-700">
                                                <td class="px-4 py-3 border">
                                                    <div class="flex items-center text-sm">
                                                        <div>
                                                            <p class="font-semibold text-black">{{ $value->complete_name }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-ms font-semibold border">{{ $value->dni}}</td>
                                                <td class="px-4 py-3 text-sm border">{{ $value->phone }}</td>
                                                <td class="px-4 py-3 text-xs border text-center">
                                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm text-center"> {{ $value->status }} </span>
                                                </td>
                                                <td class="px-4 py-3 text-xs border text-center flex">
                                                    <a href="#" class="text-gray-400 hover:text-gray-100 ml-2" wire:click="edit({{$value}})">
                                                        <i class="material-icons-outlined text-base">edit</i>
                                                    </a>
                                                    <a href="#" class="text-gray-400 hover:text-gray-100 ml-2" wire:click="$emit('deleteSupervisor',{{ $value->id }})">
                                                        <i class="material-icons-round text-base">delete_outline</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @if($coordinators->hasPages())
                                        <div class="px-6 py-3 mt-2 mb-2 mr-4 ml-4">
                                            {{ $coordinators->links() }}
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
                Edita un registro de Coordinador {{ $coordinator->firstname }} {{ $coordinator->lastname }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-jet-label value="Nombre" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="coordinator.firstname"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Apellido" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="coordinator.lastname"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Cedula" class="text-left"></x-jet-label>
                    <x-jet-input type="number" class="w-full" wire:model="coordinator.dni"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Teléfono" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="coordinator.phone"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Teléfono 2" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="coordinator.phone_two"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Dirección" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="coordinator.address"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Sexo" class="text-left"></x-jet-label>
                    <select wire:model="coordinator.gender" class="w-full" name="gender" id="gender">
                        <option value="NONE">Ningun@</option>
                        <option value="MALE">Masculino</option>
                        <option value="FEMALE">Femenino</option>
                        <option value="OTHER">Otro</option>
                    </select>
                </div>
                <div class="mb-4">
                    <x-jet-label for="brithdate" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-jet-input type="date" class="w-full" wire:model="coordinator.brithdate"></x-jet-input>
                    <x-jet-input-error for="birthdate"></x-jet-input-error>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('open_edit',false)">Cancelar</x-jet-secondary-button>
                <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">Actualizar</x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
