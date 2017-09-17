var btn = document.getElementById("getdata");
var divData = document.getElementById("data");
var data;
var countDown = 3;
function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
function getData(){  
    try{
        $.ajax({
          method: "GET",
          url: "getdata.php",
          data: { line: "getdata"},
          timeout:3000
        })
        .done(function( msg ) {
      $("#status").html("");
      if(isJson(msg))
        setData(JSON.parse(msg));
        }).fail(function(jqXHR, textStatus){
              $("#status").html(textStatus);
    });
    }
    catch(e)
    {
        $("#status").html(e.message);
    }
}
setInterval(function(){  
    countDown--;
    if(countDown==0){
        getData();
        countDown=3;
    }
$("#cound").html(countDown.toString());
}, 1000);  
function setData(data)
{
    var htmlStr ="<table class=tg >\n\
                   <tr><th>ID</th>\n\
                       <th>MESSAGE</th>\n\
                       <th>TIMESTAMP</th>\n\
                    </tr><tbody>";
    for(i=0;i<data.length;i++)
    {    
         htmlStr += "<tr><td>"+data[i].ID+"<td>"+data[i].MESSAGE+"<td>"+data[i].TIMESTAMP;
    }
    htmlStr += "</tbody></table>";
    divData.innerHTML=htmlStr;
}

