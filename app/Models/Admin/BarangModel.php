<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;
    protected $table = "tbl_barang";
    protected $primaryKey = 'barang_id';
    protected $fillable = [
        'jenisbarang_id',
        'satuan_id',
        'merk_id',
        'barang_kode',
        'barang_nama',
        'barang_slug',
        'barang_harga',
        'barang_stok',
        'barang_gambar',
    ]; 

    

    // Add relationships
    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarangModel::class, 'jenisbarang_id');
    }

    public function satuan() 
    {
        return $this->belongsTo(SatuanModel::class, 'satuan_id');
    }

    public function merk()
    {
        return $this->belongsTo(MerkModel::class, 'merk_id'); 
    }
}
