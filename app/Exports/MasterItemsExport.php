<?php

namespace App\Exports;

use App\Models\MasterItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MasterItemsExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return MasterItem::with('KategoriItems')->get();
    }

    public function headings(): array
    {
        return ['No', 'Nama Kategori', 'Nama Items', 'Nama Supplier', 'Harga', 'Laba', 'Harga Jual'];
    }

    public function map($item): array
    {
        static $no = 0;
        $no++;
        
        $kategori = $item->KategoriItems->pluck('nama_kategori')->implode(', ');
        $harga_jual = $item->harga_beli + ($item->harga_beli * $item->laba / 100);

        return [
            $no,
            $kategori,
            $item->nama,
            $item->supplier,
            $item->harga_beli,
            $item->laba . '%',
            $harga_jual
        ];
    }
}
