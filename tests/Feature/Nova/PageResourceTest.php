<?php

declare(strict_types=1);

namespace Tests\Feature\Nova;

use DrewRoberts\Blog\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tipoff\Authorization\Models\User;

class PageResourceTest extends TestCase
{
    use RefreshDatabase;

    private const NOVA_ROUTE = '/admin/dashboards/';

    public function getAdmin()
    {
        return User::role('Admin')->first() ?: User::factory()->create()->assignRole('Admin');
    }

    public function getPage()
    {
        return Page::first() ?: Page::factory()->create();
    }

    /** @test */
    public function index_page()
    {
        $this->actingAs($this->getAdmin());
        $this->get(self::NOVA_ROUTE.'page')->assertStatus(200);
    }

    /** @test */
    public function detail_page()
    {
        $this->actingAs($this->getAdmin());
        $page = $this->getPage();
        $this->get(self::NOVA_ROUTE.'pages/{$page->id}')->assertStatus(200);
    }

    /** @test */
    public function edit_page()
    {
        $this->actingAs($this->getAdmin());
        $page = $this->getPage();
        $this->get(self::NOVA_ROUTE.'pages/{$page->id}/update-fields')->assertStatus(200);
    }

    /** @test */
    public function create_page()
    {
        $this->actingAs($this->getAdmin());
        $page = $this->getPage();
        $this->get(self::NOVA_ROUTE.'pages/new')->assertStatus(200);
    }
}
