<?php

namespace Tests\Feature\CompanyController;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::findOrFail(1);
        $response = $this->actingAs($this->user)->post(route('admin.company.store'),['name' => 'Company one','email' => 'companytwoeditdelete@gmail.com','website_url'=>'www.lipsum.com/','status'=>1]);

        $this->find = Company::where('email','companytwoeditdelete@gmail.com')->firstOrFail();

    }
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function delete_company()
    {
        $response = $this->DELETE(route('admin.company.destroy',$this->find->id));

        $this->assertDatabaseMissing('companies', [
            'name' => 'Company one',
            'email' => 'companytwoeditdelete@gmail.com',
            'website_url'=>'www.lipsum.com/',
            'status'=>1
        ]);

        $response->assertStatus(200);
    }
}
