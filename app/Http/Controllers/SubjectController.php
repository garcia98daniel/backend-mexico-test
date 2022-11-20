<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User_has_subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = json_decode($request->getContent(), true);
        // $request = new Request($data);
        try {
                // error_log(auth()->user()->hasRole('admin'));

                if(auth()->user()->hasRole('admin')){    
                    $subjects = Subject::with('studentsPivot.student')->get();
                }else if(auth()->user()->hasRole('teacher')){
                    $subjects = User_has_subject::with('subjects.studentsPivot.student')
                    ->where('user_id', '=', auth()->user()->id)
                    ->first()->subjects;
                }else{
                    $response = [
                        'data' => null,
                        'message' => "no tienes permisos para ejecutar esta accion",
                    ];

                    return response($response , 401);
                }

                    if(isset($subjects)){
                        $response = [
                            'data' => $subjects,
                            'message' => "Programas listados",
                        ];
            
                        return response($response, 200);
                    }

                    $response = [
                        'data' => null,
                        'message' => $subjects,
                    ];

                    return response($response , 200);
                
                
        } catch (QueryException $exception) {
                    $response = [
                        'message' => "Error al intentar obtener programas y estudiantes",
                        'error' => $exception->getMessage(),
                    ];

                    return response($response , 500);
        }
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
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
