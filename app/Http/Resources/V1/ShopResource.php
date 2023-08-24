<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    public static $wrap = 'shops';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id' => $this->id,
          'shopName' => $this->shop_name,
           'address' => $this->address,
            'phone' => $this->phone_no,
            'user'=> new UserResource($this->whenLoaded('user'))
            /*'user'=> new UserResource($this->whenNotNull($this->whenLoaded('user')))*/

        ];
    }
}
