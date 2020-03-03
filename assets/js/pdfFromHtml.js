function htmlToPdf() {
  /*
  console.log("fce htmlToPdf");
  var pdf = new jsPDF("p", "pt", "letter");
  source = $("#HTMLtoPDF")[0];
  specialElementHandlers = {
    "#bypassme": function(element, renderer) {
      return true;
    }
  };
  margins = {
    top: 50,
    left: 60,
    width: 545
  };
  pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, // y coord
    {
      width: margins.width, // max width of content on PDF
      elementHandlers: specialElementHandlers
    },
    function(dispose) {
      // dispose: object with X, Y of the last line add to the PDF
      //          this allow the insertion of new lines after html
      pdf.save("html2pdf.pdf");
      console.log("fce htmlToPdf 1");
    }
  );
  */

  const titulek_nazevTypovehoReseni = document.getElementById(
    "projectDetailDesc--nazevTypovehoReseni"
  ).innerText;
  const text_nazevTypovehoReseni = document.getElementById(
    "projectDetail--titul"
  ).innerText;

  const titulek_kategorie = document.getElementById(
    "projectDetailDesc--kategorie"
  ).innerText;
  const text_kategorie = document.getElementById("projectDetail--kategorie")
    .innerText;

  const titulek_plny_popis = document.getElementById(
    "projectDetailDesc--plny_popis"
  ).innerText;
  const text_plny_popis = document.getElementById("projectDetail--plny_popis")
    .innerText;

  const titulek_podminky_vyuziti = document.getElementById(
    "projectDetailDesc--podminky_vyuziti"
  ).innerText;
  const text_podminky_vyuziti = document.getElementById(
    "projectDetail--podminky_vyuziti"
  ).innerText;

  let doc = new jsPDF();

  doc.setFontType("regular");
  doc.setFontSize(18);
  doc.setFont("FreeSerif");
  doc.text(20, 20, titulek_nazevTypovehoReseni);

  doc.setFontType("regular");
  doc.setFontSize(13);
  doc.setFont("FreeSerif");
  doc.setTextColor(0, 255, 0); //green color
  doc.text(20, 30, text_nazevTypovehoReseni);

  doc.setFontType("regular");
  doc.setFontSize(18);
  doc.setFont("FreeSerif");
  doc.setTextColor(0, 0, 0); //black
  doc.text(20, 40, titulek_kategorie);

  doc.setFontType("regular");
  doc.setFontSize(13);
  doc.setFont("FreeSerif");
  doc.setTextColor(0, 0, 255); //blue color
  doc.text(20, 50, text_kategorie);

  doc.setFontType("regular");
  doc.setFontSize(18);
  doc.setFont("FreeSerif");
  doc.setTextColor(0, 0, 0); //black
  doc.text(20, 60, titulek_plny_popis);

  doc.setFontType("regular");
  doc.setFontSize(13);
  doc.setFont("FreeSerif");
  doc.text(20, 70, text_plny_popis);

  doc.setFontType("regular");
  doc.setFontSize(18);
  doc.setFont("FreeSerif");
  doc.text(20, 100, titulek_podminky_vyuziti);

  doc.setFontType("regular");
  doc.setFontSize(13);
  doc.setFont("FreeSerif");
  doc.text(20, 110, text_podminky_vyuziti);

  doc.save(text_nazevTypovehoReseni + ".pdf");
}
