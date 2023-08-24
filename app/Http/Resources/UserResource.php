<?php

namespace App\Http\Resources;

use App\Http\Resources\V1\CategoryResource;
use App\Http\Resources\V1\ShopCollection;
use App\Http\Resources\V1\ShopResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'=> $this->name,
            'Email'=> $this->email,
            'Phone'=> $this->phone,
            'Address'=> $this->address,
            'Shop'=> new ShopResource($this->whenLoaded('shop'))
/*            'shop'=> new ShopResource($this->whenNotNull($this->shop))*/

        ];
    }
}
