var ele = document.querySelector("img");
ele.addEventListener("click", doSomething);
const jsConfetti = new JSConfetti();
console.log("hi");

function doSomething(){
    jsConfetti.addConfetti();
}