<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = "tbl_user";
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_foto',
        'user_nmlengkap', 
        'user_nama',
        'user_email',
        'role_id',
        'divisi',
        'departemen', 
        'nomor_hp',
        'user_password'
    ];
}
