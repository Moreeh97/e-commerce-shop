<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'name' => $this->name,
          'description' => $this->description,
          'price' => (float) $this->price,
          'on_sale' => (bool) $this->on_sale,
          'image_url' => $this->image ? asset('storage/'.$this->image) : null,
          'category' => $this->whenLoaded('category', function() {
               return [
                   'id' => $this->category->id,
                   'name' => $this->category->name,
               ];
          }),
          'created_at' => $this->created_at?->toDateTimeString(),
        ];
    }
}
