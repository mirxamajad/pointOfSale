<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accessories extends Model
{
    use SoftDeletes;

    public $table = 'series';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'model',
        'sku',
        'price',
        'quantity',
        'warranty',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function color()
    {
        return $this->belongsToMany(Color::class);
    }
    public function size()
    {
        return $this->belongsToMany(Size::class);
    }
    public function brand()
    {
        return $this->belongsToMany(Brand::class);
    }
}
