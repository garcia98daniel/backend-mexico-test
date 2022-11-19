<?php

namespace App\Http\Controllers;

use App\Models\student_has_subject;
use App\Http\Requests\Storestudent_has_subjectRequest;
use App\Http\Requests\Updatestudent_has_subjectRequest;

class StudentHasSubjectController extends Controller
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
     * @param  \App\Http\Requests\Storestudent_has_subjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storestudent_has_subjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student_has_subject  $student_has_subject
     * @return \Illuminate\Http\Response
     */
    public function show(student_has_subject $student_has_subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student_has_subject  $student_has_subject
     * @return \Illuminate\Http\Response
     */
    public function edit(student_has_subject $student_has_subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatestudent_has_subjectRequest  $request
     * @param  \App\Models\student_has_subject  $student_has_subject
     * @return \Illuminate\Http\Response
     */
    public function update(Updatestudent_has_subjectRequest $request, student_has_subject $student_has_subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student_has_subject  $student_has_subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(student_has_subject $student_has_subject)
    {
        //
    }
}
