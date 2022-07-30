<?php

namespace App\Models;

use App\Models\Translations\CategoryTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public function translations(){
        return $this->hasMany(CategoryTranslation::class);
    }

    public function translation(){
        return $this->hasOne(CategoryTranslation::class)->where('locale',app()->getLocale());
}
}
