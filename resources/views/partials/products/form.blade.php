@csrf
<div>
    <div class="w-100">
        <div id="name-price-image" class="w-100 flex space-b">
            <div>
                <label for="">Nome do Produto</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name ?? old('name') }}">

                <label for="">Código do Produto</label>
                <input type="text" class="form-control" name="code" value="{{ $product->code ?? old('code') }}">

                <label for="">Preço</label>
                <input type="number" class="form-control" name="price" value="{{ $product->price ?? old('price') }}">


                <div class="flex gap-2 w-full">
                    <div>
                        <label for="">Categoria</label>
                        <select
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="category">
                            <option selected value="0">Categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="">Status do produto</label>
                        <select
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="isActive">
                            <option selected value="1">Disponível</option>
                            <option value="0">Indisponível</option>

                        </select>
                    </div>
                </div>

            </div>
            <div id="image-product">
                <img id="preview_image" src="{{ url('/products/not_image.jpg') }}" width="100%" height="144px"
                    alt="">
            </div>
        </div>
    </div>



    <label for="">Imagem</label>
    <input type="file" class="form-control" id="product_image" name="image">

    <label for="">Quantidade</label>
    <input type="number" class="form-control" name="quantity" value="{{ $product->quantity ?? old('quantity') }}">

    <label for="">Estoque infinito</label>
    <div class="form-check">
        <label class="form-check-label">Sim</label>
        <input type="radio" class="form-check-input" name="infinite_stock" value="1" checked>
    </div>
    <div class="form-check">
        <label class="form-check-label">Não</label>
        <input type="radio" class="form-check-input" name="infinite_stock" value="0"
            {{ isset($product) && $product->infinite_stock == 0 ? 'checked' : '' }}>
    </div>

    <button type="submit" class="form-control">Cadastrar</button>
</div>
