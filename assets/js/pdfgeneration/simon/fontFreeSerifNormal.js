﻿(function (jsPDFAPI) {
var callAddFont = function () {
this.addFileToVFS('FreeSerif-normal.ttf', font);
this.addFont('FreeSerif-normal.ttf', 'FreeSerif', 'normal');
};
jsPDFAPI.events.push(['addFonts', callAddFont])
 })(jsPDF.API);