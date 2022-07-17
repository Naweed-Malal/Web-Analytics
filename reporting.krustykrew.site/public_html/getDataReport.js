console.log("testtesttest");


fetch('https://krustykrew.site/api/static', {
    method: 'GET',
}).then(res => res.json())
.then(data =>
     {
        localStorage.setItem('static', JSON.stringify(data));

})
.catch(error => console.log("error"))

fetch('https://krustykrew.site/api/performance', {
    method: 'GET',
}).then(res => res.json())
.then(data =>
     {
        localStorage.setItem('performance', JSON.stringify(data));

})
.catch(error => console.log("error"))

fetch('https://krustykrew.site/api/activity', {
    method: 'GET',
}).then(res => res.json())
.then(data =>
     {
        localStorage.setItem('activity', JSON.stringify(data));

})
.catch(error => console.log("error"))

