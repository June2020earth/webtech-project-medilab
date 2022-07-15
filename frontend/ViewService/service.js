class serviceClass
{
    constructor(key,name,description,icon)
    {
        this.name=name;
        this.description=description;
        this.icon=icon;
        this.key=key;
    }
}
function registerService(event)
{
    event.preventDefault();
    var name=document.getElementById('sname').value;
    var description=document.getElementById('sdes').value;
    var icon=document.getElementById('icn').value;
    var service =new serviceClass(name,name,description,icon);
    sendRequestXHR(JSON.stringify(service));
}
function updateService(event)
{
    event.preventDefault();
    var key=document.getElementById('origkey').value;
    alert(key);
    var name=document.getElementById('sname').value;
    var description=document.getElementById('sdes').value;
    var icon=document.getElementById('icn').value;
    var service =new serviceClass(key,name,description,icon);
    sendRequestXHRUpdate(JSON.stringify(service));
}
function sendRequestXHRUpdate(datas)
{
    var xhr=new XMLHttpRequest();
    xhr.open('POST','http://localhost:8080/api/public/serviceUpdate');
    xhr.setRequestHeader("Content-type","application/json");
    xhr.onreadystatechange=function(){
        console.log(xhr.readyState)
        if(xhr.readyState==4)
        {
            console.log(xhr.responseText);
        }
    }
    xhr.send(JSON.stringify(datas));
    var headers = xhr.getAllResponseHeaders().toLowerCase();
    window.location.href = 'http://localhost:8080/frontend/ViewService/viewService.php';
}
function sendRequestXHR(datas)
{
    var xhr=new XMLHttpRequest();
    xhr.open('POST','http://localhost:8080/api/public/service');
    xhr.setRequestHeader("Content-type","application/json");
    xhr.onreadystatechange=function(){
        console.log(xhr.readyState)
        if(xhr.readyState==4)
        {
            console.log(xhr.responseText);
        }
    }
    xhr.send(JSON.stringify(datas));
    var headers = xhr.getAllResponseHeaders().toLowerCase();
    window.location.href = 'http://localhost:8080/frontend/ViewService/viewService.php';
}
function sendRequest(datas)
{
    alert("3");
    // var xhr=new XMLHttpRequest();
    // xhr.open(type,url);
    // xhr.
    $.ajax({
        type:'Post',
        url:'http://localhost:8080/api/public',
        data:JSON.stringify(datas),
        dataType:'json',
        success:function(data,status,xhr)
        {
            console.log("success");
            console.log(data);
        }

    });
}