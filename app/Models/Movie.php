<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

   
    protected $fillable = [
        'mov_name_th', 
        'mov_year', 
        'mov_budget', 
        'mov_income', 
        'mov_dtc_id'
    ];

   
    public function distributor()
    {
       
        return $this->belongsTo(Distributor::class, 'mov_dtc_id');
    }
}