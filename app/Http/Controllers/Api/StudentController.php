<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::list();
        $students = StudentResource::collection($students);
        return response()->json(
            [
                'success' => true,
                'data' => $students
            ]
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $student = Student::store($request);
        return response()->json(
            [
                'success' => true,
                'message' => "Created student successfully"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Student not found with ID " . $id
                ]
            );
        }
        $student = new StudentResource($student);
        return response()->json(
            [
                'success' => true,
                'data' => $student
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Student not found with ID " . $id
                ]
            );
        }

        $student = Student::store($request, $id);
        return response()->json(
            [
                'success' => true,
                'message' => "Updated student successfully"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Student not found with ID " . $id
                ]
            );
        }

        $student->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "Deleted student successfully with ID ".$id
            ]
        );
    }
}
