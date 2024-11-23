<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($employee) {
            // Delete associated positions manually
            $employee->rooms()->detach();
            $employee->users()->detach();
        });
    }

}
