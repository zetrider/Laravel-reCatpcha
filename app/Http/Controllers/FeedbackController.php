<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('feedback');
    }

    /**
     * Store
     *
     * @param  \App\Http\Requests\FeedbackRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        dd($request->all());
    }
}
