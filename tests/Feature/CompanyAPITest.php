<?php

namespace Tests\Feature;

use App\Models\Company;
use Tests\TestCase;

class CompanyAPITest extends TestCase
{
    public function testGetAllCompanies()
    {
        $response = $this->get(route('company.index'));

        $response->assertStatus(200);
    }

    public function testGetSingleCompany()
    {
        $existingCompany = Company::first();

        if (!empty($existingCompany)) {
            $response = $this->get(route('company.show', $existingCompany));
            $response->assertStatus(200);
        }
    }
}
