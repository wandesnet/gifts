<?php

use App\Http\Livewire\Item\Index;

use function Pest\Laravel\get;

it('can access', function () {
    createTestUser();

    get(route('admin.items'))
        ->assertOk()
        ->assertSeeLivewire(Index::class);
});
