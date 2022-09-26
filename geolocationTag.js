const findMyArea = () => {
//   const status = document.querySelector(".status");
  const siteLocInputField = document.querySelector(".siteLoc");

  const success = (position) => {
    console.log(position);
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    console.log(latitude + " " + longitude);

    const geoApiUrl =
      "https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en";

    fetch(geoApiUrl)
      .then((res) => res.json())
      .then((data) => {
        document.getElementById("nmSiteLocation").value =
          data.principalSubdivision + " " + data.principalSubdivisionCode;
        // status.textContent = data.city + " " + data.locality;
        // siteLocInputField.textContent = data.city + " " + data.locality;
        console.log(data);
      });
  };

  const error = () => {
    status.textContent = "Unable to retrieve your location";
    siteLocInputField.textContent = "Unable to retrieve your location";
  };

  navigator.geolocation.getCurrentPosition(success, error);
};

document.querySelector(".find-geolocation").addEventListener("click", findMyArea);