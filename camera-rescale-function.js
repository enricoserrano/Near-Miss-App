let input = document.getElementById("img")

addEventListener('change', (event) => {
    let image_file = event.target.files[0]

    let reader = new FileReader
    reader.readAsDataURL(image_file)
});