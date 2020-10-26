function addTypeIDtoLink(indexValue){
  const element = document.getElementById(`type_${indexValue}`);
  const valueCheck = element.checked;

  const link = document.getElementById("pdfBatchDownload");
  const solutionsString = link.getAttribute("solutions");

  const checkString = solutionsString.includes(indexValue);

  //add item to link
  if (valueCheck == true) {
    let newSolutionsString = "";

    if ( checkString == false ) {
      if (solutionsString.length < 3) {
        newSolutionsString = indexValue;
      } else {
        newSolutionsString = solutionsString + "," + indexValue;
      }

      link.setAttribute(`solutions`, newSolutionsString);
      const newLinkHref = `solutionmpdfbatch.php?types=[${newSolutionsString}]`;
      link.setAttribute(`href`, newLinkHref); 
    }
  
  //remove item to link 
  } else {

    const indexOfSolution = solutionsString.indexOf(indexValue);
    const newSolutionsString = solutionsString;

    if (checkString) {
      const stringLength = solutionsString.length;
      let newString = "";

      if (indexOfSolution == 0) {
        newString = newSolutionsString.substring(4, stringLength);
      } else if (indexOfSolution > 0) {

        let solutionsArray = newSolutionsString.split(",");
        const toStringIndexValue = indexValue + "";
        const indexOfItemToRemove = solutionsArray.indexOf(toStringIndexValue);

        if (indexOfItemToRemove > -1) {
          solutionsArray.splice(indexOfItemToRemove, 1);
        }
        newString = solutionsArray.join();
      }

      if (newString[0] == ",") {
        const newStringLength = newString.length;
        newString = newString.substring(1, newStringLength);
      }

      if (newString[(newString.length - 1)] == ",") {
        newString = newString.substring(0, (newString.length - 2));
      }

      link.setAttribute(`solutions`, newString); 
      link.setAttribute(`href`, `solutionmpdfbatch.php?types=[${newString}]`);

    }

  }
}

function setAllSolutionCheckboxes(boolean){
  const allCheckBoxes = document.querySelectorAll(".table .includeSolutionToPdf");
  allCheckBoxes.forEach(setAsChecked);

  function setAsChecked(item, index){
    allCheckBoxes[index].checked = false;
    document.getElementById("pdfBatchDownload").setAttribute("solutions", "");
    document.getElementById("pdfBatchDownload").setAttribute("href", "#");
    if (boolean === true) {
      allCheckBoxes[index].checked = true;
      document.getElementById("pdfBatchDownload").setAttribute("solutions", "1002,1003,1203,1204,2202,2204,1105,2003,2303,1103,1207,2002,1201,2102,1001,1107,1102,1101,1205,2103,1106,2301,1104,1202,2201,1302,2001,1206,1303,1301,2203,2101,1006,1004,1005,2302,2304");
      document.getElementById("pdfBatchDownload").setAttribute("href", "solutionmpdfbatch.php?types=[1002,1003,1203,1204,2202,2204,1105,2003,2303,1103,1207,2002,1201,2102,1001,1107,1102,1101,1205,2103,1106,2301,1104,1202,2201,1302,2001,1206,1303,1301,2203,2101,1006,1004,1005,2302,2304]");
    }
  }

}