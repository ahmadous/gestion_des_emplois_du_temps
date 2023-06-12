<?php

namespace App\Models;

use App\Models\classe;
use App\Models\departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class filiere extends Model
{
    protected $fillable=['id','nom','departement_id'];
    use HasFactory;

   /**
    * Get the departement that owns the filiere
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function departement(): BelongsTo
   {
       return $this->belongsTo(departement::class);
   }

   /**
    * Get all of the classe for the filiere
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function classe(): HasMany
   {
       return $this->hasMany(classe::class);
   }

}