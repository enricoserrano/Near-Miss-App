var xhr = createRequest(); 
function getData(dataSource, divID, data1, data2)  
{ 
    if(xhr) 
    { 
        var obj = document.getElementById(divID); 
        var requestbody ="name="+encodeURIComponent(data1)+"&pwd="+encodeURIComponent(data2); 
        xhr.open("POST", dataSource, true); 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
        xhr.onreadystatechange = function() 
        { 
            alert(xhr.readyState);  
            if (xhr.readyState == 4 && xhr.status == 200) 
            { 
                obj.innerHTML = xhr.responseText; 
            } 
        }  
        xhr.send(requestbody); 
    } 
} 