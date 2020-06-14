SetDate();

function SetDate() {
  var date = new Date();

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;

  document.getElementById("prefilled_submissionDate").value = today;
}

function toggleNewProjectForm() {
  var form = document.getElementById("newProjectSubmitForm");

  if (form.classList.contains("hiddenForm")) {
    console.log("yes hiddenForm");
    form.classList.remove("hiddenForm");
  } else {
    console.log("no");
    form.classList.add("hiddenForm");
  }


}