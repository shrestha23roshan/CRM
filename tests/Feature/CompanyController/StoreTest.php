<?php

namespace Tests\Feature\CompanyController;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::findOrFail(1);
    }
    /**
     * @test
     * @group CompanyControllerStoreTest
     *
     * @return void
     */
    public function auth_user_can_access_company_store_method()
    {
        $response = $this->actingAs($this->user)->post(route('admin.company.store'),['name' => 'Company one','email' => 'companyone@gmail.com','website_url'=>'https://www.lipsum.com/','status'=>1]);
        $response->assertStatus(302);
    }

        /**
     * @test
     * @group CompanyControllerStoreTest
     *
     * @return void
     */
    public function request_data_is_stored_in_companies_table()
    {
        $response = $this->actingAs($this->user)->post(route('admin.company.store'),['name' => 'Company one','email' => 'companytwo@gmail.com','website_url'=>'https://www.lipsum.com/','status'=>1]);
        $this->assertDatabaseHas('companies', [
            'name' => 'Company one',
            'email' => 'companytwo@gmail.com',
            'website_url'=>'https://www.lipsum.com/',
            'status'=>1

        ]);

        $response->assertStatus(302);
    }
}
