<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();

        return response()->json([
            'data' => $menus,
            'message' => 'Menus retrieved successfully',
            'success' => true,
            'status' => 200,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'category' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'composition' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'required|string', // normally we upload via API but keeping it simple
        ]);

        $menu = Menu::create($validate);

        return response()->json([
            'data' => $menu,
            'message' => 'Menu created successfully',
            'success' => true,
            'status' => 201,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $menu = Menu::findOrFail($id);

            return response()->json([
                'data' => $menu,
                'message' => 'Menu retrieved successfully',
                'success' => true,
                'status' => 200,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Menu not found',
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
        try {
            $menu = Menu::findOrFail($id);

            $data = $request->all();
            $menu->update($data);

            return response()->json([
                'data' => $menu,
                'message' => 'Menu updated successfully',
                'success' => true,
                'status' => 200,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Menu not found',
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
        try {
            $menu = Menu::findOrFail($id);
            $menu->delete();

            return response()->json([
                'message' => 'Menu deleted successfully',
                'success' => true,
                'status' => 200,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Menu not found',
                'success' => false,
                'status' => 404,
            ], 404);
        }
    }
}
