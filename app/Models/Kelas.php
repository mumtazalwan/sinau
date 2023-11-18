<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'image_path'
    ];

    protected $table = 'kategori_kelas';

    public function getMapel(){
       return $this->hasMany(Mapel::class, 'class_id');
    }
}
