<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false;

    protected $fillable = ['train_id', 'type_id', 'price'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function train()
    {
        return $this->belongsTo(Train::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
