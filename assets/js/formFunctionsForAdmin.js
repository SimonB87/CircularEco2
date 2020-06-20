let addDateInTextAreaClickCounter = 0;

document.getElementById("clickToAdDateTimeForAdmin").addEventListener("click", provideDateInTextAreaForAdmin);

function provideDateInTextAreaForAdmin(){
  if (addDateInTextAreaClickCounter == 0) {
    var target = document.getElementById("administratorDecisionLetter");

    var dateString = getCurrentDateTime();
    target.innerHTML = "<< Datum: " + dateString + " >> \n\r" + target.innerHTML;
  }
  addDateInTextAreaClickCounter++;

  function getCurrentDateTime(){
    let date = new Date();
  
    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    let hour = date.getHours();
    let minute = date.getMinutes();
  
    if (minute < 10) { minute = "0" + minute }
    if (hour < 10) { hour = "0" + hour }
    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;
  
    let nowDateTime = year + "-" + month + "-" + day + " " + hour + ":" + minute;
    return nowDateTime;
  }
}

