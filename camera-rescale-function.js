let input = document.getElementById("imginput")

input.addEventListener('change', (event) => {
    let image_file = event.target.files[0]

    let reader = new FileReader
    reader.readAsDataURL(image_file)

    reader.onload = (event) => {
        let image_url = event.target.result

        let image = document.createElement("img")
        image.src = image_url

        image.onload = (e) => {
            let canvas = document.createElement("canvas")
            canvas.width = 1280
            canvas.height = 720

            const context = canvas.getContext("2d")
            context.drawImage(image, 0,0, canvas.width, canvas.height)

            let new_image_url = context.canvas.toDataURL("image/jpeg", 20)

            let new_image = document.createElement("img")
            new_image.src = new_image_url
            //document.getElementById("wrapper").appendChild(image)
            //$("#mydata").val(image);
            document.forms.myForm.mydatafile.value = new_image_url;
        }
    }
})