class Data{
    static = null;
    performance = null;
    activity = null;

    constructor(stat, perf, activ){
        this.static = stat;
        this.performance = perf;
        this.activity = activ;
    }
}

class StaticData{
    getStatic(){
        this.userAgent = navigator.userAgent;
        this.userLanguage = navigator.language;
        this.cookiesEnabled = navigator.cookieEnabled;
        this.allowJavaScript = true;
        this.allowCSS = true;
        this.allowImage = true;
        this.screenWidth = screen.width;
        this.screenHeight = screen.height;
        this.windowHeight = window.innerHeight;
        this.windowWidth = window.innerWidth;
        this.networkInfo = navigator.connection.effectiveType;
    }
    userAgent = null;
    userLanguage = null;
    cookiesEnabled = null;
    allowJavaScript = null;
    allowImage = null;
    allowCSS = null;
    screenWidth = null;
    screenHeight = null;
    windowHeight = null;
    windowWidth = null;
    networkInfo = null;
}

class PerformanceData{
    getPerformance(){
        this.timing = performance.getEntriesByType('navigation')[0];
    }
    timing = null;
    startLoad = null;
    endLoad = null;
    total = null;
}

class Activity{
    time = setInterval(this.inactivePeriod, 100);
    inactiveTime = 0;
    moveInd = 0;
    clickInd = 0;
    clickCount = 0;
    keydownInd = 0;
    keyUpInd = 0;
    scrollInd = 0;
    breakInd;

    inactivePeriod(){
        this.inactiveTime += 100;
    }


    checkInactive(){
        clearInterval(this.time);
        if(this.inactiveTime >= 2000){
            let today = new Date();
            //record current time
            breakTimes[breakInd] = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()
            //record how long it lasted
            breakDuration[breakInd++] = this.inactiveTime;
        }
        this.inactiveTime = 0;
        clearInterval(this.time);
    }

    setActivity(){
        window.addEventListener("mousemove", event =>{
            this.cursorCoordX[this.moveInd] = event.pageX;
            this.cursorCoordY[this.moveInd++] = event.pageY;
            this.checkInactive();
        });

        
        window.addEventListener("click", event =>{
            this.clickCount++;
            this.cursorClick[this.clickInd++] = event.button;
            this.checkInactive();
        });

        window.addEventListener("keydown", event =>{
            this.keydown[this.keydownInd++] = event;
            this.checkInactive();
        });

        window.addEventListener("keyup", event =>{
            this.keydown[this.keyUpInd++] = event;
            this.checkInactive();
        });

        window.addEventListener("scroll", event =>{
            this.scrollCoordX[this.scrollInd] = event.pageX;
            this.scrollCoordY[this.scrollInd++] = event.pageY;
            this.checkInactive();
        });


    }
    cursorCoordX = [];
    cursorCoordY = [];
    clickCount = null;
    whichButton = [];
    scrollCoordX = [];
    scrollCoordY = [];
    keyup = [];
    keydown = [];
    breakTimes = [];
    breakDuration = [];
    enterTime = null;
    exitTime = null;
    page = null;
}

let currentTime = new Date();
let EnterTime = currentTime.getHours() + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds()


window.addEventListener('DOMContentLoaded', main);
function main(){
    //getting when page finishes loading
    let loadTime = new Date();
    let loadComplete = loadTime.getHours() + ":" + loadTime.getMinutes() + ":" + loadTime.getSeconds()
    
    //gathering data 
    const static = new StaticData();
    static.getStatic();
    const performance = new PerformanceData();
    performance.getPerformance(); //FIXME
    const activity = new Activity();
    activity.setActivity();

    //storing start and end load time
    activity.enterTime = EnterTime;
    performance.startLoad = EnterTime;
    performance.endLoad = loadComplete;
    activity.page = window.location.pathname;

    //getting data in one unit so easier to send
    const userData = new Data(static, performance, activity);

    // saving to local storage
    localStorage.setItem("tmpData", JSON.stringify(userData));

    console.log(JSON.stringify(static));
    
    // sending off static to api/static
    fetch('https://krustykrew.site/api/static', {
        method: 'POST',
        headers: {
            'Content-Type':'application/json'
        },
        body: JSON.stringify(static)
    }).then(res => {
        return res.json()
    }).then(data => console.log(data)).catch(error => console.log("error"))


    // sending off performance to api/performance
    fetch('https://krustykrew.site/api/performance', {
        method: 'POST',
        headers: {
            'Content-Type':'application/json'
        },
        body: JSON.stringify(performance)
    }).then(res => {
        return res.json()
    }).then(data => console.log(data)).catch(error => console.log("error"))
    


    console.log(performance.timing);
    
    //navigator.sendBeacon("https://www.krustykrew.site/json/posts", JSON.stringify(userData));


    
    window.addEventListener('beforeunload', () => {
        let endTime = new Date();
        activity.exitTime = endTime.getHours() + ":" + endTime.getMinutes() + ":" + endTime.getSeconds()
        
        //convert json/arrays to strings and store in temp Activity object
        const tempActivity = new Activity();
        tempActivity.time = activity.time;
        tempActivity.inactiveTime = activity.inactiveTime;
        tempActivity.moveInd = activity.moveInd;
        tempActivity.clickInd = activity.clickInd;
        tempActivity.clickCount = activity.clickCount;
        tempActivity.keydownInd = activity.keydownInd;
        tempActivity.keyUpInd = activity.keyUpInd;
        tempActivity.scrollInd = activity.scrollInd;
        tempActivity.cursorCoordX = JSON.stringify(activity.cursorCoordX);
        tempActivity.cursorCoordY = JSON.stringify(activity.cursorCoordY);
        tempActivity.whichButton = JSON.stringify(activity.whichButton);
        tempActivity.scrollCoordX = JSON.stringify(activity.scrollCoordX);
        tempActivity.scrollCoordY = JSON.stringify(activity.scrollCoordY);
        tempActivity.keyup = JSON.stringify(activity.keyup);
        tempActivity.keydown = JSON.stringify(activity.keydown);
        tempActivity.breakTimes = JSON.stringify(activity.breakTimes);
        tempActivity.breakDuration = JSON.stringify(activity.breakDuration);
        tempActivity.enterTime = activity.enterTime;
        tempActivity.exitTime = activity.exitTime;
        tempActivity.page = activity.page;
        
        // sending off actvity to api/actvitiy
        fetch('https://krustykrew.site/api/activity', {
            method: 'POST',
            headers: {
                'Content-Type':'application/json'
            },
            body: JSON.stringify(tempActivity)
        }).then(res => {
            return res.json()
        }).then(data => console.log(data)).catch(error => console.log("error"))

        console.log(JSON.stringify(tempActivity));
        console.log('IT GETS OUTPUTTED');
    });
}

