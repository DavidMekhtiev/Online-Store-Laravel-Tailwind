<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jenre;
use App\Models\User;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';

    protected $fillable = [
        'title',
        'description',
        'price',
        'image'
    ];

    public function jenres()
    {
        return $this->belongsToMany(Jenre::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
