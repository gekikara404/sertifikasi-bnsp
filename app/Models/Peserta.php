<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
         'kd_skema', 'nm_peserta', 'jekel', 'alamat', 'no_hp',
    ];
}
