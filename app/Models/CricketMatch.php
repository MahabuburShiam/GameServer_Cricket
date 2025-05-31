<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CricketMatch extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $fillable = [
        'team1',
        'team2',
        'status',
    ];
}
