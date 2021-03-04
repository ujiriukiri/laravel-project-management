<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * The users that belong to the Issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the stage that owns the Issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    /**
     * The labels that belong to the Issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }
}
