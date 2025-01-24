<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignatureModel extends Model
{
    protected $table = 'tbl_signatures';
    protected $primaryKey = 'signature_id';
    protected $fillable = ['bm_id', 'user_id', 'role_id', 'signature', 'action'];
}
