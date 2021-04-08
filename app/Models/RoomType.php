<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table="roomtype";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'guests',
        'slug',
        'small_description',
        'description',
        'size',
    ];

    public function room()
    {
        return $this->hasMany(Room::class, 'type')->orderBy('id', 'desc');
    }
}
