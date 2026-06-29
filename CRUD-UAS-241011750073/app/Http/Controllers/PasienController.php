<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Barryvdh\DomPDF\Facade\Pdf;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::orderBy('created_at', 'desc')->get();
        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'nama_pasien' => 'required|string|max:255',
            'diagnosa' => 'required|string',
            'dokter' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $validated['gambar'] = 'images/' . $fileName;
        }

        Pasien::create($validated);

        return redirect('/admin/pasien')->with('success', 'Data Pasien berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        // Not used
    }

    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'nama_pasien' => 'required|string|max:255',
            'diagnosa' => 'required|string',
            'dokter' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
        ]);

        $pasien = Pasien::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($pasien->gambar && file_exists(public_path($pasien->gambar))) {
                @unlink(public_path($pasien->gambar));
            }
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $validated['gambar'] = 'images/' . $fileName;
        }

        $pasien->update($validated);

        return redirect('/admin/pasien')->with('success', 'Data Pasien berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        
        if ($pasien->gambar && file_exists(public_path($pasien->gambar))) {
            @unlink(public_path($pasien->gambar));
        }
        
        $pasien->delete();

        return redirect('/admin/pasien')->with('success', 'Data Pasien berhasil dihapus.');
    }

    public function exportPdf()
    {
        $pasiens = Pasien::all()->map(function ($pasien) {
            $pasien->base64Image = null;
            if ($pasien->gambar && file_exists(public_path($pasien->gambar))) {
                $type = pathinfo(public_path($pasien->gambar), PATHINFO_EXTENSION);
                $data = file_get_contents(public_path($pasien->gambar));
                $pasien->base64Image = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }
            return $pasien;
        });

        $pdf = Pdf::loadView('pasien.pdf', compact('pasiens'));
        return $pdf->download('laporan-data-pasien.pdf');
    }

    public function exportPdfSingle($id)
    {
        $pasien = Pasien::findOrFail($id);
        
        // Convert image to base64 for dompdf compatibility
        $imagePath = public_path($pasien->gambar);
        $base64Image = null;
        if ($pasien->gambar && file_exists($imagePath)) {
            $type = pathinfo($imagePath, PATHINFO_EXTENSION);
            $data = file_get_contents($imagePath);
            $base64Image = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }

        $pdf = Pdf::loadView('pasien.pdf_single', compact('pasien', 'base64Image'));
        return $pdf->download('laporan-pasien-'.$pasien->id_pasien.'.pdf');
    }
}
