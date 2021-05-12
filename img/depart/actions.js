function increaseFontSize() {
    document.getElementById("section_p").style.fontSize = "36px";
  }
  function changeImage() {
    // document.getElementById("myDIV").style.backgroundImage = "url(https://source.unsplash.com/bX9B9c-YasY)";
    // document.getElementById("myDIV").style.backgroundSize = "300px auto";
  
    document.getElementById("myImage").src =
      "https://source.unsplash.com/bX9B9c-YasY";
  }
  function changeToRandom() {
    // document.getElementById("myDIV").style.backgroundImage = "url(https://source.unsplash.com/random)";
    // document.getElementById("myDIV").style.backgroundSize = "300px auto";
    document.getElementById("myImage").src = "https://source.unsplash.com/random";
  }
  function changeToWinter() {
    // document.getElementById("myDIV").style.backgroundImage = "url(https://source.unsplash.com/featured/?winter)";
    // document.getElementById("myDIV").style.backgroundSize = "300px auto";
    document.getElementById("myImage").src =
      "https://source.unsplash.com/featured/?nature,winter";
  }
  