<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'identify' => $this->id,
            'nome' => strtoupper($this->nome),
            'valor' => $this->valor,
            'id_marca' => $this->id_marca,
            'estoque' => $this->estoque,
            'id_cidade' => $this->id_cidade,
        ];
    }
}
