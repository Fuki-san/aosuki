<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTalkRequest;
use App\Http\Requests\UpdateTalkRequest;


class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('talks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('talks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTalkRequest $request)
    {
        $
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTalkRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
