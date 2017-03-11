function printReport(table){
    var tableToPrint = document.getElementById(table);
    newWin= window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
}

function printPage(){
    //var prtContent = $("#notification-table").html();
    // var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    // WinPrint.document.write(prtContent);
    // // WinPrint.document.write(cssLinkTag);
    // WinPrint.document.close();
    // WinPrint.focus();
    // WinPrint.print();
    // WinPrint.close();

    var divToPrint=document.getElementById("notification-table");
    newWin= window.open("");
    newWin.document.write(divToPrint.outerHTML);
    // WinPrint.document.write(cssLinkTag);
    newWin.print();
    newWin.close();
}