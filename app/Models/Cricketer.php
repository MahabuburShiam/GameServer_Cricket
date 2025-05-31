<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cricketer extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'innings', 'run_rate', 'matches_played', 'other_details', 'gender'];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
