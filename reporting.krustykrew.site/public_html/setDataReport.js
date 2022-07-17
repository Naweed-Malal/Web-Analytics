window.addEventListener('load', function () {
    let static = JSON.parse(localStorage.getItem("static"));
    let performance = JSON.parse(localStorage.getItem("performance"));
    let activity = JSON.parse(localStorage.getItem("activity"));

    let len = Math.min(static.length, performance.length, activity.length);
  
    let database = [];
    let recentUsers = 10;
    let lastStatic = static.length-1;
    let lastPerformance = performance.length-1;
    let lastActivity = activity.length-1;

    for(let i = 0; i < len; ++i){
        let startTime = performance[lastPerformance-i].startLoad;

        let matchActivity = null;
        console.log("STARTTIME");
        console.log(startTime);
        for(let j = activity.length - 1; j >= 0; --j){
            if(activity[j].enterTime == startTime){
                matchActivity = j;
                break;
            }
        }
        if(matchActivity == null){
            matchActivity = lastActivity - i;
        }

        let sessionLength = null;
        if(matchActivity != null){
            console.log("IM HEREFLALF;FJ;LDFJA;DKFJK;FJ;JD")
            const tempStartTime = activity[matchActivity].enterTime.split(":");
            const tempExitTime = activity[matchActivity].exitTime.split(":");

            sessionLength = Math.abs(((parseInt(tempExitTime[0]) - parseInt(tempStartTime[0])) * 3600) + ((parseInt(tempExitTime[1]) - parseInt(tempStartTime[1])) * 60) + (parseInt(tempExitTime[2]) - parseInt(tempStartTime[2])));
            
        }
        
        let onSiteRatio = null
        if(sessionLength != null){
            onSiteRatio = parseFloat((sessionLength * 1000) / performance[lastPerformance-i].domContentLoadedEventStart);
        } 
        onSiteRatio = onSiteRatio.toFixed(2);
        let obj = {
          id: static[lastStatic-i].id,
          Load_Time: performance[lastPerformance-i].domContentLoadedEventStart,
          Session_Length: sessionLength, //change 
          Ratio_of_Session_Length_To_Load_Time: onSiteRatio, //change
          network_type: static[lastStatic-i].networkInfo
        }
      
        database.push(obj);
      }
  
    console.log(database);
    localStorage.setItem('loadDatabase', JSON.stringify(database));
    let zing = document.getElementById("thisZing");
    zing.data = database;
  })