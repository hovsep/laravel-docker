<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
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
                $company = \App\Models\Company::whereName($companyData['name'])->first();

                if (!empty($companyData['reviews'])) {
                    foreach ($companyData['reviews'] as $reviewData) {
                        (new \App\Models\Review(array_merge(
                            array_only($reviewData, ['title', 'user', 'pro', 'contra', 'suggestions']),
                            $reviewData['rating'])
                        ))->company()
                          ->associate($company)
                          ->save();
                    }
                }
            }

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to seed reviews', ['reason' => $e->getMessage()]);
        }
    }
}