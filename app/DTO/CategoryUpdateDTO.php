<?php

namespace App\DTO;

use App\Http\Requests\StoreAndUpdateCategory;


class CategoryUpdateDTO
{
    public function __construct(public string $name, public string $id)
    {
    }

    public static function makeFromRequest(StoreAndUpdateCategory $request)
    {
        return new self(
            $request->name,
            $request->id,
        );
    }
}
