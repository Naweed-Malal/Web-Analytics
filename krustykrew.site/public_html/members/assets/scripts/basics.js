
console.log('hi1');

let username = document.getElementById('crosshair');
let target = document.getElementById('target');
username.addEventListener('click', () =>{
    console.log('hi');
    target.style.cursor = 'crosshair';
})