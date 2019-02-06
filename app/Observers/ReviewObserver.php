<?php

namespace App\Observers;

use App\Models\Review;

class ReviewObserver
{
    public function saved(Review $review)
    {
        /**
         * Compare summary rating and store lowest and highest reviews when review is stored
         * It is a trade-off: we will spend more resources when storing review,
         * but optimize retrieving of highest and lowest reviews up to O(1)
         * /

        /**@var $company Company*/
        $company = $review->company()->with(['lowestReview', 'highestReview'])->first();

        if (empty($company->lowestReview) || $review->summary_rating < $company->lowestReview->summary_rating) {
            $company->update([
                'lowest_review_id' => $review->id
            ]);
        }

        if (empty($company->highestReview) || $review->summary_rating > $company->highestReview->summary_rating) {
            $company->update([
                'highest_review_id' => $review->id
            ]);
        }
    }
}
