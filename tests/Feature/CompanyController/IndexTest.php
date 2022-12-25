<?php

namespace Tests\Feature\CompanyController;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::findOrFail(1);
    }
    /**
     * @test
     * 
     * @group CompanyControllerIndexTest
     *
     * @return void
     */
    public function auth_user_can_access_company_index_method()
    {
        // $this->user = User::factory()->create();
        // dd($user);
        // $user = User::findOrFail(1);
        // dd($user);
        $response = $this->actingAs($this->user)->get(route('admin.company.index'));

        $response->assertStatus(200);
    }

    /**
     * @test
     * 
     * @group CompanyControllerIndexTest
     *
     * @return void
     */
    public function index_method_returns_view_company_index()
    {
        // $this->user = User::factory()->create();
        // dd($this->user);
        // $this->user = User::findOrFail(1);
        // dd($this->user);
        $response = $this->actingAs($this->user)->get(route('admin.company.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.companies.index');
    }

    /**
     * @test
     * 
     * @group CompanyControllerIndexTest
     *
     * @return void
     */
    public function index_method_returns_view_company_index_with_companies_data()
    {
        // $this->user = User::factory()->create();
        // dd($this->user);
        // $this->user = User::findOrFail(1);
        // dd($this->user);
        $response = $this->actingAs($this->user)->get(route('admin.company.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.companies.index');
        $response->assertViewHas('companies', Company::orderBy('created_at', 'desc')->get());
    }
}
