<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('has home page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('inserts a product in the database', function ($name, $sku, $description, $price, $newName) {
    Product::create(['name' => $name, 'sku' => $sku, 'description' => $description, 'price' => $price]);
    $this->get('/products')->assertSee($name);
    Product::findOrFail(1)->update(['name' => $newName]);
    $this->get('/products')->assertSee($newName);
})->with([
    ['gepard', 'ge123', 'Africki sprinter', 99.99, 'leopard']
]);
