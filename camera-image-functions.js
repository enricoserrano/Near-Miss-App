// Code for the uploaded image preview
const imageInput = document.querySelector("#uploaded-image"); 
var uploadedImage = "";

imageInput.addEventListener("change", function()
{
    const imageReader = new FileReader();
    imageReader.addEventListener("load", () =>
    {
        uploadedImage = imageReader.result;
        document.querySelector("#show-uploaded-image").style.backgroundImage = `url(${uploadedImage})`;
    });

    imageReader.readAsDataURL(this.files[0]);
});

// This function when called will show the preview box for the image uploaded
function showImagePreviewBox()
{
    document.getElementById('show-uploaded-image').style.display = "block";
    document.getElementById('image-preview-title').style.display = "block";
}



