<?php

namespace App\Models;

use App\Models\Translations\SliderTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['image','category_id'];

    public function translations(){
        return $this->hasMany(SliderTranslation::class);
    }

    public function translation(){
        return $this->hasOne(SliderTranslation::class)->where('locale',app()->getLocale());
    }
}
