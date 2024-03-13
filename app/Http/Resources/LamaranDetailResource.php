<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LamaranDetailResource extends JsonResource
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
            'lamaran' => $this->lowongan,
            'pelamar' => $this->pelamar,
            'cv' => $this->cv,
            'created_at' => $this->created_at
        ];
    }
}
