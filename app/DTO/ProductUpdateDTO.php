<?php

namespace App\DTO;

use App\Http\Requests\StoreAndUpdateProduct;


class ProductCreateDTO
{
    public function __construct(public string $name, public float $price, public string | null $image = '', public int $quantity, public int $category, public int $isActive, public int $infinite_stock)
    {
    }
    public static function makeFromRequest(StoreAndUpdateProduct $request)
    {
        return new self(
            $request->id,
            $request->name,
            $request->price,
            $request->image,
            $request->quanity,
            $request->category,
            $request->isActive,
            $request->infinite_stock
        );
    }
}
