<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Review;
use Tests\TestCase;

class ReviewAPITest extends TestCase
{

    public function testSubmitReview()
    {
        /**@var $review Review*/
        $review = factory(Review::class)->make();
        $company = Company::first();

        $this->assertNotEmpty($company);

        if (!empty($company)) {

            $requestData = array_merge(
                array_only($review->toArray(), [
                    'title',
                    'user',
                    'culture',
                    'management',
                    'work_live_balance',
                    'career_development',
                    'pro',
                    'contra',
                    'suggestions'
                ]),
                [
                    'company_slug' => $company->slug
                ]
            );

            $response = $this->post(route('review.store'), $requestData);

            $response->assertStatus(200);
            $response->assertExactJson(['msg' => 'ok']);
            $this->assertDatabaseHas('reviews', $review->toArray());
        }
    }
}
