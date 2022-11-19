<?php

namespace App\Http\Controllers;

use App\Models\Subject_has_student;
use App\Http\Requests\StoreSubject_has_studentRequest;
use App\Http\Requests\UpdateSubject_has_studentRequest;

class SubjectHasStudentController extends Controller
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
     * @param  \App\Http\Requests\StoreSubject_has_studentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubject_has_studentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject_has_student  $subject_has_student
     * @return \Illuminate\Http\Response
     */
    public function show(Subject_has_student $subject_has_student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject_has_student  $subject_has_student
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject_has_student $subject_has_student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubject_has_studentRequest  $request
     * @param  \App\Models\Subject_has_student  $subject_has_student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubject_has_studentRequest $request, Subject_has_student $subject_has_student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject_has_student  $subject_has_student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject_has_student $subject_has_student)
    {
        //
    }
}
