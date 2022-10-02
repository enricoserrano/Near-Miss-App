const findMyArea = () => {
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

        document.getElementById("nmRegionSubdiv").value =
          data.principalSubdivision + " " + data.principalSubdivisionCode;
        let caseRegion =
          data.principalSubdivision + " " + data.principalSubdivisionCode;
        console.log(data);
        console.log(caseRegion);
      });
  };

  const error = () => {
    status.textContent = "Unable to retrieve your location";
    siteLocInputField.textContent = "Unable to retrieve your location";
  };

  navigator.geolocation.getCurrentPosition(success, error);
};

document.querySelector(".find-geolocation").addEventListener("click", findMyArea);