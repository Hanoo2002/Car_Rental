var email = document.getElementById("email");
var password = document.getElementById("password");
var name = document.getElementById("name");
var pasCon=document.getElementById("password_c")

var email_error = document.getElementById('Email_error');
var password_error = document.getElementById('password_error');
var name_error = document.getElementById('name_error')
var pasCon_error = document.getElementById('pasCon_error')


email.addEventListener('textInput',email_Verify);
password.addEventListener('textInput',password_Verify);
name.addEventListener('textInput', name_Verify);
pasCon.addEventListener('textInput',passowrd_confirmation);
function validate(){
if(email.value.length< 9) {
    email.style.border = "1px solid red";
    email_error.style.display="block";
    email.focus();
    return false;}

if(password.value.length< 6) {
        password.style.border = "1px solid red";
    password_error.style.display="block";
        password.focus();
        return false;
}

    if(name.value.length<1) {
        name.style.border = "1px solid red";
        name_error.style.display="block";
        name.focus();
        return false;
    }

    if(password.value!==pasCon.value){
        pasCon.style.border= "1px solid red";
        pasCon_error.style.display="block";
        pasCon.focus();
        return false;
    }
}
function email_Verify(){
    let re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(! re.test(email.value)) {
        email.style.border = "1px solid red";
        email_error.style.display="block";
        email_error.innerHTML = "Invalid email";
        return false;
    }

    if (email.value.length>=8) {
        email.style.border = "1px solid silver";
        email_error.style.display="none";
        return true;
    }
}
function name_Verify(){

    if (name.value.length>=1) {
        name.style.border = "1px solid silver";
        name.style.display="none";
        return true;
    }
    else {
        name.style.border = "1px solid red";
        name_error.style.display="block";
        name_error.innerHTML = "insert your name";
        return false;
    }
}

function password_Verify(){
    if (password.value.length>=6) {
        password.style.border = "1px solid silver";
        password_error.style.display="none";
        return true;
    }
    else{
        password.style.border = "1px solid red";
        password_error.style.display="block";
        password_error.innerHTML = "please enter your password";
        return false;
    }
}

function password_Verify_Reg(){
    if (password.value.length>=6) {
        password.style.border = "1px solid silver";
        password_error.style.display="none";
        return true;
    }
    else{
        password.style.border = "1px solid red";
        password_error.style.display="block";
        password_error.innerHTML = "password should be more than 6 characters";
        return false;
    }
}

function passowrd_confirmation() {
    if(password.value===pasCon.value){
        pasCon.style.border = "1px solid silver";
        pasCon_error.style.display="none";
        return true;
    }
    else {
        pasCon.style.border = "1px solid red";
        pasCon_error.style.display="block";
        pasCon_error.innerHTML = "password doesn't match";
        return false;
    }

}