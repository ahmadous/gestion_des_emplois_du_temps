<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class emplois_du_temps extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the emplois_du_temps
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the creneau for the emplois_du_temps
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creneau(): HasMany
    {
        return $this->hasMany(creneau::class);
    }
}
