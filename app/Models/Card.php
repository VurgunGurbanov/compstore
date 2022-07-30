<?php

namespace App\Models;

use App\Models\Translations\CardTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['image','category_id','locale'];

    public function translations(){
        return $this->hasMany(CardTranslation::class);
    }

    public function translation(){
        return $this->hasOne(CardTranslation::class)->where('locale',app()->getLocale());
    }
}
