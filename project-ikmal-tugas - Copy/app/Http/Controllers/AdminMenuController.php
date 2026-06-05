<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'composition' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('feane-assets/images'), $imagePath);
        }

        Menu::create([
            'category' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'composition' => $request->composition,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'composition' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $menu = Menu::findOrFail($id);

        $imagePath = $menu->image;
        if ($request->hasFile('image')) {
            $imagePath = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('feane-assets/images'), $imagePath);
        }

        $menu->update([
            'category' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'composition' => $request->composition,
            'price' => $request->price,
            'image' => $imagePath,
        ]);
        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }

    public function cetak_pdf()
    {
        $menus = Menu::latest()->get();
        $pdf = Pdf::loadView('admin.menu.pdf', compact('menus'));
        return $pdf->stream('menus.pdf');
    }
    public function cetak_pdf_By_Id($id)
    {
        $menu = Menu::findOrFail($id);
        $pdf = Pdf::loadView('admin.menu.pdf-by-id', compact('menu'));
        return $pdf->stream('menu.pdf');
    }

}
