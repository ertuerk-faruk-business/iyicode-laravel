<?php

namespace IyiCode\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use IyiCode\App\Support\Collection;

class CollectionTest extends TestCase
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function collection_can_add_item()
    {
        $this->assertEquals([
            1
        ], Collection::create()->add(1)->get());
    }

    /** @test */
    public function collection_can_remove_item_from_list()
    {
        $this->assertEquals([2, 3], Collection::create([1, 2, 3])->remove(1)->get());

        $this->assertEquals([1, 3], Collection::create([1, 2, 3])->removeAt(1)->get());

        $this->assertEquals([], Collection::create([null])->remove(0)->get());
    }

    /** @test */
    public function collection_can_remove_item_from_map()
    {
        $this->assertEquals([], Collection::create(['1' => null])->remove('1')->get());

        $this->assertEquals([], Collection::create(['test' => null])->remove('test')->get());
    }
}
