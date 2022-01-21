<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        <i class="fas fa-user-plus"></i>&nbsp;&nbsp;Agregar Supervisor
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar información a la lista suprevisores
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
                <x-jet-label for="brithdate" value="{{ __('Fecha de Nacimiento') }}" />
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input datepicker="" datepicker-autohide="" wire:model="birthdate" name="birthdate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Selecciona una fecha">
                </div>
            </div>
            @livewire('states-cities', ['selectedCity' => 1])
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
                <x-jet-input-error for="address"></x-jet-input-error>
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
                <x-jet-label value="Comentario"></x-jet-label>
                <textarea wire:model="coment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  rows="5"></textarea>
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

