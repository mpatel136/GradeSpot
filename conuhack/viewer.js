document.getElementById("pdf-form").onsubmit = function(event) {
  event.preventDefault();

  var pdfContainer = document.getElementById("pdf-container");
  var pdfFile = document.getElementById("pdf-file").files[0];

  var formData = new FormData();
  formData.append("pdf-file", pdfFile);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "viewer.php", true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      var pdfUrl = xhr.responseText;
      var pdf = PDFObject.embed(pdfUrl, pdfContainer);

      if (!pdf) {
        pdfContainer.innerHTML = "This browser does not support PDFObject. Please use a different browser to view the PDF.";
      }
    } else {
      pdfContainer.innerHTML = "An error occurred while uploading the file. Please try again later.";
    }
  };
  xhr.send(formData);
};
