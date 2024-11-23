<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Room extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }

    public function entries()
    {
        return $this->hasMany(UserRoomEntry::class);
    }
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($positions) {
            // Delete associated positions manually
            $positions->positions()->detach();
        });
    }

}
