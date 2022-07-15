class user
{
    constructor(email,password)
    {
        this.email=email;
        this.password=password;

    }
}
function register(event)
{
    event.preventDefault();
    var email=document.getElementById('email').value;
    var password=document.getElementById('password').value;
    var users=new user(email,password);
    sendRequestXHR(JSON.stringify(users));
    console.log(JSON.stringify(users));
}
function sendRequestXHR(datas)
{
    var xhr=new XMLHttpRequest();
    xhr.open('POST','http://localhost:8080/api/public/register');
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
    alert();
}
function sendRequest(datas)
{
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