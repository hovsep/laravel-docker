<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Throwable
     */
    public function run()
    {
        try {
            $data = json_decode(file_get_contents(database_path('seeds/data.json')), true);

            throw_unless(array_key_exists('companies', $data), new \Exception('Invalid data'));

            foreach ($data['companies'] as $companyData) {
                \App\Models\Company::create(array_only($companyData, ['name', 'slug', 'city', 'country', 'industry']));
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to seed companies', ['reason' => $e->getMessage()]);
        }

    }
}
