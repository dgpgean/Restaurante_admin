<?php

namespace App\Models;

use App\DTO\{CategoryCreateDTO, CategoryUpdateDTO};
use App\Http\Requests\StoreAndUpdateCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

use stdClass;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];



    public function createCategory(CategoryCreateDTO $dto, StoreAndUpdateCategory $request): stdClass|null
    {
        $category = $this->create((array) $dto);
        return (object) $category->toArray();
    }

    public function getAllPaginate(string $filter = null): LengthAwarePaginator|null
    {
        $result = $this->when($filter, function ($query) use ($filter) {
            $query->where('name', 'like', "%$filter%");
        })->paginate(4);

        return $result;
    }


    public function getAll(string $filter = null)
    {
        $result = $this->all();

        return $result;
    }
    public function deleteCategory(int $id = null,): stdClass|null
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
        }
        return $result;
    }

    public function editCategory(CategoryUpdateDTO $dto): stdClass|null
    {
        if (!$category = $this->find($dto->id)) {
            return null;
        }
        $category->update((array) $dto);

        return (object) $category->toArray();
    }
}
