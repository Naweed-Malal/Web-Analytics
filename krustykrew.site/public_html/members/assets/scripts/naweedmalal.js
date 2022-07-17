var temp = document.getElementById("img");
var images = ["https://m.media-amazon.com/images/M/MV5BZjNmZDhkN2QtNDYyZC00YzJmLTg0ODUtN2FjNjhhMzE3ZmUxXkEyXkFqcGdeQXVyNjc2NjA5MTU@._V1_FMjpg_UX1000_.jpg","https://m.media-amazon.com/images/M/MV5BNzc5MTczNDQtNDFjNi00ZDU5LWFkNzItOTE1NzQzMzdhNzMxXkEyXkFqcGdeQXVyNTgyNTA4MjM@._V1_.jpg", "https://img1.ak.crunchyroll.com/i/spire3/501db6b69ced79e79a556b20cbdb9c5d1609784936_main.jpg", "https://m.media-amazon.com/images/M/MV5BODcwNWE3OTMtMDc3MS00NDFjLWE1OTAtNDU3NjgxODMxY2UyXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg"];
var nextImage = 1;

if(temp){
    temp.addEventListener("click", doSomething);
}


function doSomething() {
    var img = document.getElementById("img");
    img.src = images[nextImage];
    nextImage = (nextImage + 1) % 4;
  }