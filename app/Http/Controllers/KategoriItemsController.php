<?php

namespace App\Http\Controllers;

use App\Models\KategoriItem;
use App\Models\MasterItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KategoriItemsController extends Controller
{
    public function index(Request $request)
    {
        $query = KategoriItem::query();

        if ($request->nama_kategori) {
            $query->where('nama_kategori','like','%'.$request->nama_kategori.'%');
        }

        if ($request->kode_kategori) {
            $query->where('kode_kategori',$request->kode_kategori);
        }

        return view('kategori.index', [
            'data' => $query->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required|unique:kategori_items',
            'nama_kategori' => 'required'
        ]);

        KategoriItem::create($request->only('kode_kategori','nama_kategori'));

        return redirect('kategori-items');
    }

    public function show($id)
    {
        $kategori = KategoriItem::with('masterItems')->findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    public function exportPdf($id)
    {
        $kategori = KategoriItem::with('masterItems')->findOrFail($id);
        $date = now()->format('d-m-Y H:i:s');

        $pdf = Pdf::loadView('kategori.pdf', compact('kategori', 'date'))
                ->setPaper('a4', 'portrait');
        
        return $pdf->download('Kategori-'.$kategori->nama_kategori.'.pdf');
    }
}
