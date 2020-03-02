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
  console.log("fce htmlToPdf");

  var part1a = "Název typového řešení: ";
  var part1b = document.getElementById("projectDetail--titul").innerText;
  var part1 = part1a + part1b;

  var part2a = "Kategorie: ";
  var part2b = document.getElementById("projectDetail--kategorie").innerText;
  var part2 = part2a + part2b;

  var part3a = "Plný popis: ";
  var part3b = document.getElementById("projectDetail--plny_popis").innerText;
  var part3 = part3a + part3b;

  var doc = new jsPDF();

  /*
  doc.setFontSize(24);
  doc.text(2, 6, part1a);

  doc.setFontSize(20);
  doc.text(8, 14, part1b);

  doc.setFontSize(18);
  doc.setFontType("bold");
  doc.text(16, 20, part2a);

  doc.setFontSize(14);
  doc.text(22, 24, part2b);

  doc.setFontSize(18);
  doc.setFontType("bold");
  doc.text(2, 14, part3a);

  doc.setFontSize(14);
  doc.text(2, 16, part3b);
  */

  doc.setFontType("bold");
  doc.setFontSize(18);
  doc.text(20, 20, part1a);

  doc.setFontType("regular");
  doc.setFontSize(13);
  doc.text(20, 30, part1b);

  //doc.setFont("times");
  //doc.setFontType("italic");
  doc.setFontType("bold");
  doc.setFontSize(18);
  doc.text(20, 40, part2a);

  //doc.setFont("helvetica");
  doc.setFontType("regular");
  doc.setFontSize(13);
  doc.text(20, 50, part2b);

  //doc.setFont("courier");
  //doc.setFontType("bolditalic");
  doc.setFontType("bold");
  doc.setFontSize(18);
  doc.text(20, 60, part3a);

  doc.setFontType("regular");
  doc.setFontSize(13);
  doc.text(20, 70, part3b);

  /*
  doc.setFont("courier");
  doc.setFontType("bolditalic");
  doc.text(20, 60, "This is courier bolditalic.");*/

  doc.save(part1b + ".pdf");
}
