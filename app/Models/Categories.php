<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function subCategory($query)
    {
        $query = $query->get();

        $rootQuery = $query->where('parent_id', null)->toArray();

        foreach ($rootQuery as $key => $item) {
            $rootQuery[$key]['children'] = $query->where('parent_id', $item['id'])->toArray();
        }

        return $rootQuery;
    }

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }
}
