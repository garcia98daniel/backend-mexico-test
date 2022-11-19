<?php

namespace App\Http\Controllers;

use App\Models\user_has_subject;
use App\Http\Requests\Storeuser_has_subjectRequest;
use App\Http\Requests\Updateuser_has_subjectRequest;

class UserHasSubjectController extends Controller
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
     * @param  \App\Http\Requests\Storeuser_has_subjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_has_subjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_has_subject  $user_has_subject
     * @return \Illuminate\Http\Response
     */
    public function show(user_has_subject $user_has_subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_has_subject  $user_has_subject
     * @return \Illuminate\Http\Response
     */
    public function edit(user_has_subject $user_has_subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_has_subjectRequest  $request
     * @param  \App\Models\user_has_subject  $user_has_subject
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_has_subjectRequest $request, user_has_subject $user_has_subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_has_subject  $user_has_subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_has_subject $user_has_subject)
    {
        //
    }
}
