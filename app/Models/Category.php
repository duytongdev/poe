<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory, Searchable;

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'parent_id' => $this->parent_id
        ];
    }
}
