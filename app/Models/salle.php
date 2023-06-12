<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class salle extends Model
{
    protected $fillable=['id','nom','nombre'];
    use HasFactory;

    /**
     * Get all of the creneau for the salle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creneau(): HasMany
    {
        return $this->hasMany(creneau::class);
    }
}