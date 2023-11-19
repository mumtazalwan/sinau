<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DetailRangkumanCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => 'detail rangkuman '.$this->judul_rangkuman,
            'data' => [
                'id' => $this->id,
                'rangkuman_file' => Storage::url($this->rangkuman_pdf),
                'judul_rangkuman' => $this->judul_rangkuman,
                'deskripsi' => $this->deskripsi,
                'author' => new UserCollection($this->getAuthor),
                'mapel' => $this->getSubject->class_name,
                'kelas' => $this->getClass->class_name,
                'like' => 100,
            ],
            'additional_feats' => [
                'download' => '',
                'share' => Storage::url($this->rangkuman_pdf)
            ]
        ];
    }
}
