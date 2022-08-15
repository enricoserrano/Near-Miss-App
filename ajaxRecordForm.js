//Creates and uses a function and event called "onreadystatechange" tp indicate when something has finished loading information - used with XHR
var xhr = createRequest(); 
function getData(dataSource, divID, nmDesc, nmDateTime, nmPriorityLevel) { 
    if(xhr) { //Find if XHR is created else no connection or data will be returned
     var obj = document.getElementById(divID); 
     var requestbody ="&description="+encodeURIComponent(nmDesc)+"&dateTime="+encodeURIComponent(nmDateTime)+"&priority="+encodeURIComponent(nmPriorityLevel); 
     xhr.open("POST", dataSource, true);  //Used to open link/url or datasource, with the "true" meaning that asynchronous access is requested 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
     xhr.onreadystatechange = function() 
     { 
        alert(xhr.readyState); 
        if (xhr.readyState == 4 && xhr.status == 200) 
        { 
            obj.innerHTML = xhr.responseText; 
        } 
     } // end anonymous call-back function 
     xhr.send(requestbody); 
 } 
}