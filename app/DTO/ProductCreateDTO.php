<?php

namespace App\DTO;

use App\Http\Requests\StoreAndUpdateProduct;


class ProductCreateDTO
{
    public function __construct(public string $name, public float $price, public string | null $image = '', public int $quantity, public int $infinite_stock)
    {
    }

    public static function makeFromRequest(StoreAndUpdateProduct $request)
    {
        return new self(
            $request->name,
            $request->price,
            $request->file('image'),
            $request->quantity ?? 0,
            $request->infinite_stock
        );
    }
}
