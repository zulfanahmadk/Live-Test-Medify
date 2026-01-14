<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'master_items';

    protected $fillable = [
        'nama',
        'harga_beli',
        'laba',
        'supplier_id',
        'jenis_id',
        'photo',
    ];

    public function KategoriItems()
    {
        return $this->belongsToMany(KategoriItem::class, 'kategori_item_master_items', 'master_item_id', 'kategori_item_id');
    }

}
