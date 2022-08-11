//Code for the web cam app 
// const webCamElement = document.getElementById("webCam");
// const canvasElement = document.getElementById("canvas");
// const webcam = new Webcam(webCamElement, "user", canvasElement);

// webcam.start();

// function takeAPicture(){
//     let picture = webcam.snap();
//     document.querySelector("a").href = picture;
// }

// Webcam elements
const webcamElement = document.getElementById("webCamera");
const photoCanvasElement = document.getElementById("photoCanvas");

// Use webcam constructor from library 
const userWebcam = new Webcam(webcamElement, "user", photoCanvasElement);

// Start webcam
userWebcam.start();

function takePhoto()
{
    let photo = userWebcam.snap();
    document.querySelector("a").href = photo;
}

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
