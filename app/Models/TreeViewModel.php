<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreeViewModel extends Model
{
    protected $table = 'tree_view_models';

    protected $fillable = ['name', 'parent_id', 'is_checked'];

    public function children()
    {
        return $this->hasMany(TreeViewModel::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(TreeViewModel::class, 'parent_id');
    }
}
