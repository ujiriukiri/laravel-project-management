<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Label extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * The issues that belong to the Label
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }
}
