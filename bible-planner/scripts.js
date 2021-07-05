/**-----------------------------------------------------------
 * name: bible.js
 * purpose: jQuery scripts bible project scripts
 * author: david kim
 * last revised: july 4th, 2021
 * Copyright 2021 David Kim. All rights reserved.
 -----------------------------------------------------------*/
$(document).ready(function () {
  $("#select-all").click(function () {
    $('input[type="checkbox"]').prop("checked", this.checked);
  });
});

function downloadCSV() {
  let csvString = document.getElementById("plan-csv").innerHTML;
  let hiddenElement = document.createElement("a");
  hiddenElement.href = "data:text/csv;charset=utf-8," + encodeURI(csvString);
  hiddenElement.target = "_blank";
  hiddenElement.download = "reading_plan.csv";
  hiddenElement.click();
}
