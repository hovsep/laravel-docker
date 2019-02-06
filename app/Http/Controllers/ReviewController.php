<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'                 => 'required|string',
            'user'                  => 'required|email',
            'culture'               => 'required|int|min:0',
            'management'            => 'required|int|min:0',
            'work_live_balance'     => 'required|int|min:0',
            'career_development'    => 'required|int|min:0',
            'pro'                   => 'required|string',
            'contra'                => 'required|string',
            'suggestions'           => 'required|string',
            'company_slug'          => 'required|exists:companies,slug'
        ]);

        try {
            $company = Company::whereSlug($request->company_slug)->firstOrFail();

            (new Review($request->except('company_slug')))
                ->company()
                ->associate($company)
                ->save();

            return response()->json(['msg' => 'ok']);
        } catch (\Exception $e) {
            $error = 'Failed to store review';
            Log::error($error, ['reason' => $e->getMessage()]);
            return response()->json(['error' => $error], 500);
        }
    }
}
