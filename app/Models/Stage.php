<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stage extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Get the issues that owns the Stage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
