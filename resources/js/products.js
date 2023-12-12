//Preview image
product_image = document.getElementById('product_image');
preview_image = document.getElementById('preview_image');

product_image.onchange = evt => {
    const [file] = product_image.files
    if (file) {
        preview_image.src = URL.createObjectURL(file)
    }
}
