<div>
    <x-modal.card :title="__('Edição de Item: #:id', ['id' => $item?->id])" wire:model.defer="modal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input label="Nome" wire:model.defer="item.name" />

            @if ($item)
                <x-filter.category wire:model.defer="item.category_id" />
            @endif

            <div class="col-span-full">
                <x-textarea label="Descrição"
                            wire:model.defer="item.description"
                            class="resize-none"
                            rows="8"
                />
            </div>

            <div class="col-span-full">
                <x-inputs.number label="Quantidade"
                                 :min="1"
                                 wire:model.defer="item.quantity" />
            </div>

            <div class="col-span-full flex items-center gap-2">
                <x-toggle label="Ativo" lg wire:model.defer="item.is_active" />
                <x-toggle label="Cotas" lg wire:model.debounce.250ms="item.is_quotable" />
            </div>

            @if ($item?->is_quotable)
                <x-input type="number"
                         label="Valor"
                         wire:model="item.price"
                />

                <x-input label="Referência" wire:model.defer="item.reference" />
            @endif
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <div class="flex">
                    <x-button flat label="Cancelar" x-on:click="close" />
                    <x-button primary label="Salvar" wire:click="update" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
