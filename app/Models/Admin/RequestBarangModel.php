<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBarangModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_request_barang';
    protected $primaryKey = 'request_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'request_id',
        'user_id',
        'request_tanggal',
        'departemen',
        'status',
        'keterangan',
    ];
}
