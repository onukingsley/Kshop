<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\CategoryCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'shopId'=> $this->shop_id,
            'cate'=> $this->category->category_name,
            'categoryId'=> $this->category_id,
            'description'=> $this->description ,
            'image'=>$this->image,
            'price'=> $this->price,
            'quantity'=> $this->quantity,
            'discountPrice'=> $this->discount_price,
            'category' => new CategoryResource($this->whenLoaded('category')),

        ];
    }
}
