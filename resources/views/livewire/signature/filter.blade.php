<div>
    <div>
        <x-button.circle xs primary wire:click="$toggle('modal')">
            <x-heroicon-s-funnel class="h-4 w-4" />
        </x-button.circle>
        @if ($filtered)
            <x-badge flat>
                {{ $count }} filtro(s)
                <x-heroicon-s-x-circle wire:click="clear"
                                       class="cursor-pointer w-4 h-4 text-red-500" />
            </x-badge>
        @endif
    </div>
    <x-modal.card title="Filtros" wire:model.defer="modal" max-width="lg">
        <div class="grid grid-cols-1 gap-4">
            <x-filter.category wire:model.debounce.250ms="category"/>

            <x-select label="Item"
                      placeholder="Procure um item"
                      :async-data="[
                        'api'    => route('api.search.item'),
                        'params' => ['category' => $category, 'active' => false],
                      ]"
                      option-label="name"
                      option-value="id"
                      wire:model.defer="item"
            />

            <x-datetime-picker label="Data Inicial"
                               :max="now()"
                               wire:model.defer="start"
            />

            <x-datetime-picker label="Data Final"
                               :max="now()"
                               wire:model.defer="end"
            />
        </div>
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <div class="flex">
                    <x-button flat label="Cancelar" x-on:click="close"/>
                    <x-button primary label="Filtrar" wire:click="filter"/>
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
