<?php

namespace Tests\Feature\CompanyController;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    // use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::findOrFail(1);
        $response = $this->actingAs($this->user)->post(route('admin.company.store'),['name' => 'Company one','email' => 'companytwoupdate@gmail.com','website_url'=>'www.lipsum.com/','status'=>1]);

        $this->find = Company::where('email','companytwoupdate@gmail.com')->firstOrFail();

    }
    /**
     * @test
     * @group CompanyControllerUpdateTest
     *
     * @return void
     */
    public function auth_user_can_access_company_update_method()
    {
        $response = $this->actingAs($this->user)->put(route('admin.company.update',$this->find->id),['name' => 'Company one Update','email' => 'companytwoupdateone@gmail.com','website_url'=>'www.lipsum.com/','status'=>1]);
        $response->assertStatus(302);
    }

        /**
     * @test
     * @group CompanyControllerUpdateTest
     *
     * @return void
     */
    public function request_data_is_updated_in_companies_table()
    {
        $response = $this->actingAs($this->user)->put(route('admin.company.update',$this->find->id),['name' => 'Company one Update','email' => 'companytwoupdatetwo@gmail.com','website_url'=>'www.lipsum.com/','status'=>1]);
        $this->assertDatabaseHas('companies', [
            'name' => 'Company one Update',
            'email' => 'companytwoupdatetwo@gmail.com',
            'website_url'=>'www.lipsum.com/',
            'status'=>1

        ]);

        $response->assertStatus(302);
    }
}
