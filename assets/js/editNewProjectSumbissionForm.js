var currentOptionSelected = 0;

let isCurrentUrlIsAmendProjectDetail = checkCurrentUrlIsAmendProjectDetail(window.location.href);
if (isCurrentUrlIsAmendProjectDetail) {
  setDate();
}

function checkCurrentUrlIsAmendProjectDetail(currentUrl){
  let result = currentUrl.indexOf("amendProjectDetail.php");

  if (!(result == -1)) {
    
    return true;
  } else {
    
    return false;
  }
}

function setCurrentSollutionFromOptions() {
  var urlString = window.location.href;
  var keyWord = "projectnumber=";
  var idStart = urlString.search(keyWord) + keyWord.length;

  var id = urlString.slice(idStart, idStart + 4);

  var targetSelect = document.getElementById("projectGroup");
  var numberOfOptionsInTargetSelect = targetSelect.options.length;
  var currentOption;

  for (var i = 0; i < numberOfOptionsInTargetSelect; i++) {
    currentOption = targetSelect.options[i].value.slice(0, 4);

    if (currentOption == id) {
      var optionText = targetSelect.options[i].innerHTML;
      if (currentOptionSelected === 0) {
        targetSelect.options[i].innerHTML = " >> " + optionText + " << ";
      }
      targetSelect.options[i].selected = "selected";
    }
  }

}

function getCurrentUrl() {
  var urlInput = document.getElementById("prefilled_currentUrl");
  var currentUrl = window.location.href;

  urlInput.value = currentUrl;
}

function setDate() {
  var date = new Date();

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
  var hour = date.getHours();
  var minute = date.getMinutes();

  if (minute < 10) { minute = "0" + minute }
  if (hour < 10) { hour = "0" + hour }
  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day + " " + hour + ":" + minute;

  document.getElementById("prefilled_submissionDate").value = today;
}

function toggleNewProjectForm() {
  setDate();
  getCurrentUrl();
  var form = document.getElementById("newProjectSubmitForm");

  if (form.classList.contains("hiddenForm")) {
    form.classList.remove("hiddenForm");
  } else {
    form.classList.add("hiddenForm");
  }

  if (currentOptionSelected == false) {
    setCurrentSollutionFromOptions();
    currentOptionSelected++;
  }

}