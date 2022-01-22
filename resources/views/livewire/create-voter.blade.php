<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        <i class="fas fa-user-plus"></i>&nbsp;&nbsp;Agregar Votante
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar información a la lista Votantes
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre"></x-jet-label>
                <x-jet-input style="text-transform: uppercase;" type="text" class="w-full" wire:model.defer="firstname"></x-jet-input>
                <x-jet-input-error for="firstname"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Apellido"></x-jet-label>
                <x-jet-input style="text-transform: uppercase;" type="text" class="w-full" wire:model.defer="lastname"></x-jet-input>
                <x-jet-input-error for="lastname"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Cedula"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="dni"></x-jet-input>
                <x-jet-input-error for="dni"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Teléfono"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="phone"></x-jet-input>
                <x-jet-input-error for="phone"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Teléfono 2(Opcional)"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="phone_two"></x-jet-input>
                <x-jet-input-error for="phone_two"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Dirección"></x-jet-label>
                <x-jet-input style="text-transform: uppercase;" type="text" class="w-full" wire:model.defer="address"></x-jet-input>
                <x-jet-input-error for="address"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label for="birthdate" value="{{ __('Fecha de Nacimiento') }}" />
                <x-jet-input type="date" class="w-full" wire:model.defer="birthdate"></x-jet-input>
                <x-jet-input-error for="birthdate"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label for="state">{{ __('Departamento') }}</x-jet-label>
                <select wire:model="selectedState" class="form-select appearance-none
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
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option value="" selected>Escoje un Departamento</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="state"></x-jet-input-error>
            </div>
        
            @if (!is_null($selectedState))
                <div class="mb-4">
                    <x-jet-label for="city">{{ __('Ciudad') }}</x-jet-label>
                    <select wire:model="selectedCity" class="form-select appearance-none
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
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="city_id">
                        <option value="" selected>Escoje una ciudad</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="city_id"></x-jet-input-error>
                </div>
            @endif
    
            <div class="mb-4">
                <x-jet-label value="Sexo"></x-jet-label>
                <select wire:model="gender" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option value="NONE" selected>Ninguno</option>
                    <option value="MALE" selected>Masculino</option>
                    <option value="FEMALE" selected>Femenino</option>
                    <option value="OTHER" selected>Otro</option>
                </select>
                <x-jet-input-error for="gender"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Numero de hijos"></x-jet-label>
                <x-jet-input style="text-transform: uppercase;" type="text" class="w-full" wire:model.defer="son_number"></x-jet-input>
                <x-jet-input-error for="son_number"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Seleccione una o varias opciones"></x-jet-label>
                <div class="flex justify-left">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="guide" wire:model="guide" value="">
                        <label class="form-check-label inline-block text-gray-800" for="guide">Guía</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="witness" wire:model="witness" value="">
                        <label class="form-check-label inline-block text-gray-800" for="witness">Testigo</label>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <x-jet-label value="Escoja un Lider"></x-jet-label>
                <select wire:model="lider_id" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option value="" disabled selected>Escoje un Lider</option>
                    @foreach($liders as $lider)
                        <option value="{{ $lider->id }}">{{ $lider->firstname }} {{ $lider->lastname }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="lider_id"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Comentario"></x-jet-label>
                <textarea wire:model="comment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  rows="5"></textarea>
                <x-jet-input-error for="comment"></x-jet-input-error>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                <i class="fas fa-ban"></i>&nbsp;&nbsp;Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                <i class="far fa-save"></i>&nbsp;&nbsp;Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

