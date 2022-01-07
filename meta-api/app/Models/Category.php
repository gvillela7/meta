<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'status',
        'parent_id',
    ];

    public function category(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
