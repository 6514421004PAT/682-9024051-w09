<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    
    protected $table = 'distributors';

    
    protected $fillable = ['dtb_name'];

   
    public function movies()
    {
       
        return $this->hasMany(Movie::class, 'mov_dtc_id');
    }
}