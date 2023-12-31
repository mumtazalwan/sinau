<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rangkuman extends Model
{
    use HasFactory;

    protected $table = 'rangkuman_materi';
    protected $guarded = ['id'];

    public function getAuthor(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getClass(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function getSubject(){
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
