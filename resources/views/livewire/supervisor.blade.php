<div wire:init="loadSupervisor">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supervisor') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="container mx-auto p-6">
                    <div class="box pt-6">
                        <div class="box-wrapper">
                            <div class="flex justify-end p-4">
                                @livewire('create-supervisor')
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
                                @if( count($supervisors) > 0)
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
                                        @foreach($supervisors as $value)
                                            <tr class="text-gray-700">
                                                <td class="px-4 py-3 border">
                                                    <div class="flex items-center text-sm">
                                                        <div>
                                                            <p class="font-semibold text-black">{{ $value->firstname}} {{ $value->lastname}}</p>
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
                                    @if($supervisors->hasPages())
                                        <div class="px-6 py-3 mt-2 mb-2 mr-4 ml-4">
                                            {{ $supervisors->links() }}
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
                Edita un registro de Supervisor {{ $supervisor->name }} {{ $supervisor->last }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-jet-label value="Nombre" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="supervisor.name"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Apellido" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="supervisor.last"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Cedula" class="text-left"></x-jet-label>
                    <x-jet-input type="number" class="w-full" wire:model="supervisor.dni"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Teléfono" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="supervisor.phone"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Teléfono 2" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="supervisor.phone_two"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Dirección" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="supervisor.address"></x-jet-input>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Teléfono" class="text-left"></x-jet-label>
                    <select wire:model="supervisor.gender" class="w-full" name="gender" id="gender">
                        <option value="NONE">Ningun@</option>
                        <option value="MALE">Masculino</option>
                        <option value="FEMALE">Femenino</option>
                        <option value="OTHER">Otro</option>
                    </select>
                </div>
                <div class="mb-4">
                    <x-jet-label for="brithdate" value="{{ __('Fecha de Nacimiento') }}" />
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input datepicker="" datepicker-autohide="" wire:model="supervisor.birthdate" name="birthdate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Selecciona una fecha">
                    </div>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Dirección" class="text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="supervisor.address"></x-jet-input>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('open_edit',false)">Cancelar</x-jet-secondary-button>
                <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">Actualizar</x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
