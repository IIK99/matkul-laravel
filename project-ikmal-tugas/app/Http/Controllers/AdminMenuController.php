<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminMenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Menu::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('category', 'like', '%' . $search . '%');
        }

        $menus = $query->latest()->paginate(10);
        return view('admin.menus.index', compact('menus', 'search'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('feane-assets/images'), $imageName);

        Menu::create([
            'category' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'composition' => $request->composition,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu = Menu::findOrFail($id);
        
        $imageName = $menu->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('feane-assets/images'), $imageName);
        }

        $menu->update([
            'category' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'composition' => $request->composition,
            'price' => $request->price,
            'image' => $imageName,
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
        $pdf = Pdf::loadView('admin.menus.pdf', compact('menus'));
        return $pdf->stream('menus-report.pdf');
    }

    public function cetak_pdf_By_Id($id)
    {
        $menu = Menu::findOrFail($id);
        $pdf = Pdf::loadView('admin.menus.pdf-by-id', compact('menu'));
        return $pdf->stream('menu-report-' . $id . '.pdf');
    }
}
