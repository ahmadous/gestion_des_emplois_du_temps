<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class type_intervention extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the creneau for the type_intervention
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creneau(): HasMany
    {
        return $this->hasMany(creneau::class);
    }

}