SetDate();
getCurrentUrl();

function setCurrentSollutionFromOptions() {
  var urlString = window.location.href;
  var keyWord = "projectnumber=";
  var idStart = urlString.search(keyWord) + keyWord.length;

  var id = urlString.slice(idStart, idStart + 4);

  console.log(id);

  var targetSelect = document.getElementById("projectGroup");
  var numberOfOptionsInTargetSelect = targetSelect.options.length;
  var currentOption;

  for (var i = 0; i < numberOfOptionsInTargetSelect; i++) {
    currentOption = targetSelect.options[i].value.slice(0, 4);

    if (currentOption == id) {
      var optionText = targetSelect.options[i].innerHTML;
      targetSelect.options[i].innerHTML = ">> " + optionText + " <<";
      targetSelect.options[i].selected = "selected";
    }
  }

}

function getCurrentUrl() {
  var urlInput = document.getElementById("prefilled_currentUrl");
  var currentUrl = window.location.href;

  urlInput.value = currentUrl;
}

function SetDate() {
  var date = new Date();

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
  var hour = date.getHours();
  var minute = date.getMinutes();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day + " " + hour + ":" + minute;

  document.getElementById("prefilled_submissionDate").value = today;
}

function toggleNewProjectForm() {
  var form = document.getElementById("newProjectSubmitForm");

  if (form.classList.contains("hiddenForm")) {
    form.classList.remove("hiddenForm");
  } else {
    form.classList.add("hiddenForm");
  }

  setCurrentSollutionFromOptions();

}