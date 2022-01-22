<div>
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
</div>
