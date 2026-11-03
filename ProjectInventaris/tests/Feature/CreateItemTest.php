<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateItemTest extends TestCase
{
    public function test_create_form_uses_the_named_store_route(): void
    {
        $this->get(route('items.create'))
            ->assertOk()
            ->assertSee(route('items.store'), false)
            ->assertSee('value="rusak ringan"', false)
            ->assertSee('value="rusak parah"', false);
    }

    public function test_invalid_item_input_returns_to_the_form_with_errors(): void
    {
        $this->from(route('items.create'))
            ->post(route('items.store'), [
                'code' => '',
                'item_name' => '',
                'category' => '',
                'stock' => -1,
                'condition' => 'rusak_ringan',
            ])
            ->assertRedirect(route('items.create'))
            ->assertSessionHasErrors(['code', 'item_name', 'category', 'stock', 'condition']);
    }
}
