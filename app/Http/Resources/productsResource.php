<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class productsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'image' => $this->image,
            'color' => $this->color,
            'desc_en' => $this->desc_en,
            'desc_ar' => $this->desc_ar,
            'created_at' => $this->created_at,
            'category_id' => CategoriseResource::collection($this->category),
            // 'sizes' => $this->SizesResource::collection($this->size),

        ];
    }
}
