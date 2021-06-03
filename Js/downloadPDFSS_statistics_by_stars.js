function screenshot(){
    html2canvas(document.getElementsByClassName("content")).then(function(canvas){
        var imgdata = canvas.toDataURL('image/png');
        var doc = new jsPDF();
        doc.addImage(imgdata,'PNG',10,10);
        doc.save("statistics_by_stars.pdf")
    });
}