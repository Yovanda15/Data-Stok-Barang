<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stokkeluar extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
       ];

       public function stokbarang()
       {
           return $this->belongsTo(stokbarang::class);
       }
}
