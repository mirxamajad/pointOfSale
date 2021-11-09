<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Brand extends Model
{
    use SoftDeletes;

    public $table = 'brands';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function series()
    {
        return $this->belongsToMany(Series::class);
    }
}
