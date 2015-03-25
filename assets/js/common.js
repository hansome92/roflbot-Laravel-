function DoMenu(page) {
    var divGlobal = document.getElementById('divGlobal'); 
    var divTask = document.getElementById('divTasks'); 
    var divAudit = document.getElementById('divAudits'); 
    var divElearning = document.getElementById('divElearning');
    
    var aGlobal = document.getElementById('aGlobal'); 
    var aTask = document.getElementById('aTasks'); 
    var aAudit = document.getElementById('aAudits'); 
    var aElearning = document.getElementById('aElearning');
     
    switch(page) {
        case "Global":
            divGlobal.className = "divBlock";
            divTask.className = "divNone";
            divAudit.className = "divNone";
            divElearning.className = "divNone";
             
            aGlobal.className = "activeLink";
            aTask.className = "";
            aAudit.className = "";
            aElearning.className = "";
        break;
        case "Task":
            divGlobal.className = "divNone";
            divTask.className = "divBlock";
            divAudit.className = "divNone";
            divElearning.className = "divNone"; 
            
            aGlobal.className = "";
            aTask.className = "activeLink";
            aAudit.className = "";
            aElearning.className = "";           
        break;
        case "Audit":
            divGlobal.className = "divNone";
            divTask.className = "divNone";
            divAudit.className = "divBlock";
            divElearning.className = "divNone";
                       
            aGlobal.className = "";
            aTask.className = "";
            aAudit.className = "activeLink";
            aElearning.className = "";            
        break;
        case "Elearning":         
            divGlobal.className = "divNone";
            divTask.className = "divNone";
            divAudit.className = "divNone";
            divElearning.className = "divBlock";   
            
            aGlobal.className = "";
            aTask.className = "";
            aAudit.className = "";
            aElearning.className = "activeLink";
        break;
        default:
            aGlobal.className = "activeLink";
            aTask.className = "";
            aAudit.className = "";
            aElearning.className = "";
            
        break;
    }
    
}