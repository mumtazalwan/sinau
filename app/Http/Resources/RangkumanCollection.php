<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RangkumanCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'rangkuman_file' => $this->rangkuman_pdf,
            'judul_rangkuman' => $this->judul_rangkuman,
            'deskripsi' => $this->deskripsi,
            'author' => new UserCollection($this->whenLoaded('getAuthor')),
            'mapel' => $this->getSubject->class_name,
            'kelas' => $this->getClass->class_name
        ];
    }
}
