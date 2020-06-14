SetDate();

function SetDate() {
  var date = new Date();

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
  /*   var hour = date.getHours();
    var minute = date.getMinutes(); */

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;

  document.getElementById("prefilled_submissionDate").value = today;
}

function toggleNewProjectForm() {
  var form = document.getElementById("newProjectSubmitForm");

  if (form.classList.contains("hiddenForm")) {
    form.classList.remove("hiddenForm");
  } else {
    form.classList.add("hiddenForm");
  }

}