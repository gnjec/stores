<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
uses(LazilyRefreshDatabase::class);


it('has home page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('inserts a product in the database', function ($name, $sku, $description, $price) {
    Product::create(['name' => $name, 'sku' => $sku, 'description' => $description, 'price' => $price]);
    $this->get('/products')->assertSee($name);
})->with([
    ['gepard', 'ge123', 'Africki sprinter', 99.99]
]);

it('updates first product name', function ($name) {
    Product::create(['name' => 'panter', 'sku' => 'pa123', 'description' => 'Panter za...', 'price' => 56]);
    Product::findOrFail(1)->update(['name' => $name]);
    $this->get('/products')->assertSee($name);
})->with([
    ['leopard']
]);
