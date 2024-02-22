<?php

namespace App\Http\Resources;

use App\Models\Domicilio;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SucursalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return [
            'id'=>$this->id,
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'domicilio' => $this->domicilio,
            'mesas_count'=>$this->mesasCount,
        ];
    }
}
