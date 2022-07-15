class whyClass
{
    constructor(key, order, header ,description,icon)
    {
        this.header=header;
        this.order=order;
        this.description=description;
        this.icon=icon;
        this.key=key;
    }
}
function registerWny(event)
{
    event.preventDefault();
    var header=document.getElementById('header').value;
    var order=document.getElementById('order').value;
    var description=document.getElementById('content').value;
    var icon=document.getElementById('icon').value;
    var why =new whyClass(header,order,header,description,icon);
    sendRequestXHR(JSON.stringify(why));
}
function updateWhy(event)
{
    alert("ANother page");
    event.preventDefault();
    var header=document.getElementById('header').value;
    var order=document.getElementById('order').value;
    var description=document.getElementById('content').value;
    var icon=document.getElementById('icon').value;
    var key=document.getElementById('origKey').value;
    var why =new whyClass(key,order,header,description,icon);
    sendRequestXHRUpdate(JSON.stringify(why));
}
function sendRequestXHRUpdate(datas)
{
    var xhr=new XMLHttpRequest();
    xhr.open('POST','http://localhost:8080/api/public/whyMedilabUpdate');
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
    window.location.href = 'http://localhost:8080/frontend/Why/viewWhy.php';
}
function sendRequestXHR(datas)
{
    var xhr=new XMLHttpRequest();
    xhr.open('POST','http://localhost:8080/api/public/whyMedilab');
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
    window.location.href = 'http://localhost:8080/frontend/Why/viewWhy.php';
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