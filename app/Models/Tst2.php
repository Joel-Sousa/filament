<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tst2 extends Model
{
    use HasFactory;

    protected $table = 'tst2s';

    protected $fillable = [
        'name',
        'tst1_id',
    ];

    public function tst2(){
        return $this->belongsTo(Tst1::class, 'tst1_id');
    }

    public function tst3(){
        return $this->hasOne(Tst3::class, 'tst2_id');
    }
}
