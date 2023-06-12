<?php

namespace App\Models;

use App\Models\filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class classe extends Model
{
    protected $guarded=['id'];
    use HasFactory;

    public function filere():BelongsTo
    {
        return $this->belongsTo(filiere::class);
    }

    /**
     * Get all of the creneau for the classe
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creneau(): HasMany
    {
        return $this->hasMany(creneau::class);
    }

    /**
     * Get the filiere that owns the classe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filiere(): BelongsTo
    {
        return $this->belongsTo(filiere::class);
    }
}