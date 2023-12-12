<?php

namespace App\DTO;

use App\Http\Requests\StoreAndUpdateCategory;


class CategoryCreateDTO
{
    public function __construct(public string $name)
    {
    }

    public static function makeFromRequest(StoreAndUpdateCategory $request)
    {
        return new self(
            $request->name,
        );
    }
}
