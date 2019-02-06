<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
