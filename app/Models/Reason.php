<?php

namespace App\Models;
use \Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
class Reason extends Model
{
    use HasFactory;
    protected $table='reasons';
    protected $fillable = [
        'category',
        'note',
    ];
    protected $hidden = [
        'remember_token',
    ];
    // public function later(){
    //     return $this->hasMany(Later::class, 'reason_id', 'id');
    // }


}
