<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Later extends Model
{
    use HasFactory;
    protected $table='later';
    //phanloai	lydo	ngayxinphep	songaynghi	users_id	reason_id	trangthai
    protected $fillable = [
        'category',
        'reason',
        'date',
        'requestlate',
        'datebreak',
        'users_id',
        'reason_id',
        'status',
        'delete',
    ];
}
