<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => (string)$this->id,
                'type' => 'Products',
                'attributes' => [
                    'name' => $this->name,
                    'price' => $this->price,
                    'description' => $this->description,
                    'slug' => $this->slug,
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at
                ]
            ];
    }
}
