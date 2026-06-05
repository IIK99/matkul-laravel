<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();

        return response()->json([
            'data' => $users,
            'message' => 'Users retrieved successfully',
            'success' => true,
            'status' => 200,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|confirmed|min:8',
            'phone' => 'required|nullable',
            'role' => 'nullable|string',
        ]);
        $validate['password'] = bcrypt($validate['password']);

        $user = User::create($validate);

        return response()->json([
            'data' => $user,
            'message' => 'User created successfully',
            'success' => true,
            'status' => 201,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $user = User::findOrFail($id);

            return response()->json([
                'data' => $user,
                'message' => 'User retrieved successfully',
                'success' => true,
                'status' => 200,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found',
                'success' => false,
                'status' => 404,
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $user = User::findOrFail($id);

            $validate = $request->validate([
                'name' => 'sometimes|required|max:255',
                'email' => 'sometimes|required|email|unique:users,email,'.$user->id.'|max:255',
                'password' => 'sometimes|required|confirmed|min:8',
                'phone' => 'nullable',
                'address' => 'nullable',
                'role' => 'nullable|string',
            ]);

            if (isset($validate['password'])) {
                $validate['password'] = bcrypt($validate['password']);
            } else {
                unset($validate['password']);
            }

            $user->update($validate);

            return response()->json([
                'data' => $user,
                'message' => 'User updated successfully',
                'success' => true,
                'status' => 200,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found',
                'success' => false,
                'status' => 404,
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json([
                'message' => 'User deleted successfully',
                'success' => true,
                'status' => 200,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found',
                'success' => false,
                'status' => 404,
            ], 404);
        }
    }
}
