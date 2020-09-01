<?php

namespace App\Http\Controllers;

use App\Inquiry;
use App\Mail\InquiryCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Inquiry/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'message' => 'required|max:500',
        ]);

        $inquiry = Inquiry::create($request->toArray());
        Mail::to('devtest@worksite.ca')->send(new InquiryCreated($inquiry));

        return $inquiry;
    }
}
