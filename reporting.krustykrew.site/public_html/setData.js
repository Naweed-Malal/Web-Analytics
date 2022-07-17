window.addEventListener('load', function () {
let static = JSON.parse(localStorage.getItem("static"));
let performance = JSON.parse(localStorage.getItem("performance"));
let activity = JSON.parse(localStorage.getItem("activity"));

/*
let len = Math.min(static.length, performance.length);

let database = [];

for (let i = 0; i < len; i++) {
    let tempDevice =  "Other";
    console.log(static[i].userAgent);
    if(static[i].userAgent.includes("Macintosh")){
        tempDevice = "Macintosh";
    }
    else if(static[i].userAgent.includes("Windows")){
        tempDevice = "Windows";
    }

    let obj = {
        id: static[i].id,
        device: tempDevice,
        loadTime: performance[i].domContentLoadedEventStart,
        type: performance[i].type
    }
    
    database.push(obj);
  }

  let zing = document.getElementById("thisZing");
  zing.data = database;
})
*/

// last 'x' users we're going to display data for 
let recentUsers = 10;
let database = [];
let lastStatic = static.length-1;
let lastPerformance = performance.length-1;
let lastActivity = activity.length-1;

console.log(lastStatic);
console.log(lastPerformance);
console.log(lastActivity);

for(let i = 0; i < recentUsers; ++i){

  let tempDevice =  "Mobile";
  if(static[lastStatic-i].userAgent.includes("Macintosh")){
      tempDevice = "Mac";
  }
  else if(static[lastStatic-i].userAgent.includes("Windows")){
      tempDevice = "Windows";
  }

  // Make sure clicks are not null but 0
  let clickCount;
  if(activity[lastActivity-i].clickCount == null){
    clickCount = 0;
  }
  else{
    clickCount = activity[lastActivity-i].clickCount;
  }

  // Mean Cursor X
  let cursor_coord_x = activity[lastActivity-i].cursorCoordX;
  let meanX = 0;
  let countX = 0;
  for(let x in cursor_coord_x){
    meanX += parseInt(x, 10);
    countX += 1;
  }
  meanX = meanX/countX;


  // Mean Cursor Y
  let cursor_coord_y = activity[lastActivity-i].cursorCoordY;
  let meanY = 0;
  let countY = 0;
  for(let y in cursor_coord_y){
    meanY += parseInt(y, 10);
    countY += 1;
  }
  meanY = meanY/countY;

  let obj = {
    id: static[lastStatic-i].id,
    Load_Time: performance[lastPerformance-i].domContentLoadedEventStart,
    Device: tempDevice,
    Clicks: clickCount,
    Load_Type: performance[lastPerformance-i].type,
    Click_to_Key_Ratio: clickCount / (activity[lastActivity-i].keydownInd + 1),
    Cursor_X: meanX,
    Cursor_Y: meanY
  }

  database.push(obj);
}

let zing = document.getElementById("thisZing");
zing.data = database;
})