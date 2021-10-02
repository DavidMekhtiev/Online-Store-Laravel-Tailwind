<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class Jenre extends Model
{
    use HasFactory;

    protected $table = 'jenres';

    protected $fillable = [
        'title'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
