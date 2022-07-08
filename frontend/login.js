class user
{
    constructor(email,password)
    {
        this.email=email;
        this.password=password;

    }
}
var token="";
var hd;
function LoginUser(event)
{
    event.preventDefault();
    console.log("Hello");
    var email=document.getElementById('email').value;
    var password=document.getElementById('password').value;
    var users=new user(email,password);
    
     sendRequestXHR(JSON.stringify(users));
    // console.log(JSON.stringify(users));
}
function sendRequestXHR(datas)
{
    var xhr=new XMLHttpRequest();
    xhr.open('POST','http://localhost:8080/api/public/login');
    xhr.setRequestHeader("Content-type","application/json");
    
    xhr.send(JSON.stringify(datas));
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4)
        {

            console.log(xhr.responseText);
            var headers = xhr.getAllResponseHeaders().toLowerCase();
            console.log(headers);
            hd=headers;
            alert(headers['authorization']);
        }
    }
    
}