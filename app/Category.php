<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
//    protected $table = 'categories';
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
