<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Http\Resources\ClassroomResource;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::list();
        $classrooms = ClassroomResource::collection($classrooms);
        return response()->json(
            [
                'success' => true,
                'data' => $classrooms
            ]
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {
        $classroom = Classroom::store($request);
        return response()->json(
            [
                'success' => true,
                'message' => "Created classroom successfully"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classroom = Classroom::find($id);
        if (!$classroom) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "classroom not found with ID " . $id
                ]
            );
        }
        $classroom = new ClassroomResource($classroom);
        return response()->json(
            [
                'success' => true,
                'data' => $classroom
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $classroom = Classroom::find($id);
        if (!$classroom) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "classroom not found with ID " . $id
                ]
            );
        }

        $classroom = Classroom::store($request, $id);
        return response()->json(
            [
                'success' => true,
                'message' => "Updated classroom successfully"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classroom = Classroom::find($id);
        if (!$classroom) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "classroom not found with ID " . $id
                ]
            );
        }

        $classroom->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "Deleted classroom successfully with ID ".$id
            ]
        );
    }
}
