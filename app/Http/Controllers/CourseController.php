<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $course;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        return $this->course->paginate(10);
    }

    public function show($course)
    {
        return $this->course->findOrFail($course);
    }

    public function store(Request $request)
    {
        $this->course->create($request->all());

        return response()->json([
            'data'=>[
                'message'=>'Registro criado com sucesso!'
            ]
        ]);
    }

    public function update($course, Request $request)
    {
        $course = $this->course->find($course);
        $course->update($request->all());

        return response()->json([
            'data'=>[
                'message'=>'Registro atualizado com sucesso!'
            ]
        ]);
    }

    public function destroy($course)
    {
        $course = $this->course->find($course);
        $course->delete();

        return response()->json([
            'data'=>[
                'message'=>'Registro removido com sucesso!'
            ]
        ]);
    }
}
