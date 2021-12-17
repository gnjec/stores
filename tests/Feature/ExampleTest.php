<?php

namespace Tests\Feature;

use App\Models\Url;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class ExampleTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_home(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_inserts_a_product_in_the_database(): void
    {
        [$name, $sku, $description, $price] = ['gepard', 'ge123', 'Africki sprinter', 99.99];
        Product::create(['name' => $name, 'sku' => $sku, 'description' => $description, 'price' => $price]);
        $this->assertSame($name, Product::first()->name);
        $this->assertSame($sku, Url::first()->path);
    }

    public function test_updates_first_product_name(): void
    {
        [$name, $sku, $description, $price] = ['gepard', 'ge123', 'Africki sprinter', 99.99];
        Product::create(['name' => $name, 'sku' => $sku, 'description' => $description, 'price' => $price]);
        [$newName] = ['leopard'];
        Product::findOrFail(1)->update(['name' => $newName]);
        $this->assertSame($newName, Product::first()->name);
    }

    public function test_request_product_create_with_custom_slug()
    {
        [$name, $sku, $description, $price, $slug] = ['gepard', 'ge123', 'Africki sprinter', 99.99, 'gepi'];
        $response = $this->post(
            '/products',
            ['name' => $name, 'sku' => $sku, 'description' => $description, 'price' => $price, 'slug' => $slug]
        );
        $this->assertSame($name, Product::first()->name);
        $this->assertSame($slug, Url::first()->path);
    }
}
