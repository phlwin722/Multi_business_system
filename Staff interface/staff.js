function renderTime (){
    // date
    let mydate = new Date();
    let year = mydate.getYear();

      if (year < 1000){
        year += 1900
      }
    let day = mydate.getDay();
    let month = mydate.getMonth();
    let daym = mydate.getDate();
    let dayarray = new Array ("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
    let montarray = new Array ("January","February","March","April","May","June","July","August","September","October","November","December");
      // date end

      // time
      let currentTime = new Date();
      let currentHours = currentTime.getHours();
      let currentMinutes = currentTime.getMinutes();
      let currentSeconds = currentTime.getSeconds();
         if(currentHours == 24){
            currentHours = 0;
         } else if (currentHours > 12){
            currentHours -= 0;
         }
         if(currentHours < 10){
            currentHours = "0" + currentHours;
         }
         if (currentMinutes < 10){
            currentMinutes = "0" + currentMinutes;
         }
         if (currentSeconds < 10){
            currentSeconds = "0" + currentSeconds;
         }

         var myClock = document.getElementById ("clock-display");
         myClock.textContent = "" + dayarray[day] + " " + daym + " " + montarray[month] + " " + year + " | " + currentHours + ":" + currentMinutes + ":" + currentSeconds;
         myClock.innerText ="" + dayarray[day] + " " + daym + " " + montarray[month] + " " + year + " | " + currentHours + ":" + currentMinutes + ":" + currentSeconds;
        
         setTimeout("renderTime()",1000);
       
}
renderTime();





