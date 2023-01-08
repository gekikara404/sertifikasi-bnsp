<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skema extends Model
{
    use HasFactory;
    protected $table = 'skema';
    protected $primaryKey = 'kd_skema';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'kd_skema', 'nm_skema', 'jenis', 'jml_unit',
    ];
}
