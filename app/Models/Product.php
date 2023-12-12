<?php

namespace App\Models;

use App\DTO\{ProductCreateDTO};
use App\Http\Requests\StoreAndUpdateProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use stdClass;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'quantity',
        'infinite_stock'
    ];

    public function createProduct(ProductCreateDTO $dto, StoreAndUpdateProduct $request): stdClass|null
    {
        if ($dto->image) {
            $dto->image = $this->uploadImage($request);
        } else {
            $dto->image = 'not_image.jpg';
        }

        $product = $this->create((array) $dto);
        return (object) $product->toArray();
    }

    public function getAll(string $filter = null, string $category = null): LengthAwarePaginator|null
    {
        $result = $this->when($filter, function ($query) use ($filter) {
            $query->where('name', 'like', "%$filter%");
        })
            ->when($category, function ($query) use ($filter) {
                $query->where('category', $filter);
            })
            ->paginate(4);
        return $result;
    }

    public function uploadImage(StoreAndUpdateProduct $request)
    {
        $imageName = $request->file('image')->getClientOriginalName();
        $image = $request->file('image')->move('products', $imageName);

        return $image;
    }
}
