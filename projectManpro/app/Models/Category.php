<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory;

    protected $fillable = [
        'name_kategori',
        'id_user',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function menu(){
        return $this->hasMany(Menu::class);
    }


}
