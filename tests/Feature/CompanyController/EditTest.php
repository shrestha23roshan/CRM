<?php

namespace Tests\Feature\CompanyController;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::findOrFail(1);

        $response = $this->actingAs($this->user)->post(route('admin.company.store'),['name' => 'Company one','email' => 'companytwoedit@gmail.com','website_url'=>'https://www.lipsum.com/','status'=>1]);
        $this->find = Company::where('email','companytwoedit@gmail.com')->firstOrFail();
    }
    /**
     * @test
     * 
     * @group CompanyControllerEditTest
     *
     * @return void
     */
    public function auth_user_can_access_company_edit_method()
    {
        // $this->user = User::factory()->create();
        // dd($user);
        // $user = User::findOrFail(1);
        // dd($user);
        $response = $this->actingAs($this->user)->get(route('admin.company.edit',$this->find->id));

        $response->assertStatus(200);
    }

    /**
     * @test
     * 
     * @group CompanyControllerEditTest
     *
     * @return void
     */
    public function edit_method_returns_view_company_edit()
    {
        // $this->user = User::factory()->create();
        // dd($this->user);
        // $this->user = User::findOrFail(1);
        // dd($this->user);
        $response = $this->actingAs($this->user)->get(route('admin.company.edit',$this->find->id));

        $response->assertStatus(200);
        $response->assertViewIs('admin.companies.edit');
    }

    /**
     * @test
     * 
     * @group CompanyControllerEditTest
     *
     * @return void
     */
    public function edit_method_returns_view_company_edit_with_companies_data()
    {
        // $this->user = User::factory()->create();
        // dd($this->user);
        // $this->user = User::findOrFail(1);
        // dd($this->user);
        $response = $this->actingAs($this->user)->get(route('admin.company.edit',$this->find->id));

        $response->assertStatus(200);
        $response->assertViewIs('admin.companies.edit');
        $response->assertViewHas('company', $this->find);
    }
}
