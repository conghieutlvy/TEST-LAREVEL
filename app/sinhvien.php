<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sinhvien extends Model
{
	protected $table = 'sinhvien';
    protected $fillable = [
        'TEN SINH VIEN', 'MA SINH VIEN',
    ];
	public $timestamps = true;
}
