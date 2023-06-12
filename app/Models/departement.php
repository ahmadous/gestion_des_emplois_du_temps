<?php

namespace App\Models;

use App\Models\filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class departement extends Model
{
    protected $fillable=['id','nom'];
    use HasFactory;

    /**
     * Get all of the filiere for the departement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filiere(): HasMany
    {
        return $this->hasMany(filiere::class);
    }
}