<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['code', 'name'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
