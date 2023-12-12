@csrf
<div>
    <div class="w-100">
        <div id="name-price-image" class="w-100 flex space-b">
            <div>
                <label for="">Nome do Produto</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name ?? old('name') }}">

                <label for="">Preço</label>
                <input type="number" class="form-control" name="price" value="{{ $product->price ?? old('price') }}">
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
