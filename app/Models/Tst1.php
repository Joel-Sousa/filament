<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tst1 extends Model
{
    use HasFactory;

    protected $table = 'tst1s';

    protected $fillable = [
        'name',
    ];

    public function tst1(){
        return $this->hasOne(Tst2::class, 'tst1_id');
    }
}
