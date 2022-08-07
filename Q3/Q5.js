function doDate()
{
    var str = "";

    var days = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    var months = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    var now = new Date();

    str += "Today is: " + days[now.getDay()] + ", " + now.getDate() + " " + months[now.getMonth()] + " " + now.getFullYear() + " " + ('0' + now.getHours()).slice(-2) +":" + ('0' + now.getMinutes()).slice(-2) + ":" + ('0' + now.getSeconds()).slice(-2);
    document.getElementById("todaysDate").innerHTML = str;
}
setInterval(doDate, 1000);

function validateFormGive(){
    var doc = document.forms["formGive"];

    var radioType = doc["typeR"];
    var formValid = false;
    var i = 0;
    while (!formValid && i < radioType.length) {
        if (radioType[i].checked)formValid = true;
        i++;      
    }
    if(!formValid){ 
        alert("Please ensure that the animal type is not empty!");
        return formValid;
    }

    var breed = doc["breedField"];
    var name = doc["namegive"];
    var email = doc["emailgive"];
    if(breed.value == '' || name.value == '' || email.value == ''){
        formValid = false;
        alert("Please ensure that none of the text fields are empty and that the email is a valid format!");
        return formValid;
    }

    var radioGender = doc["gender"];
    formValid = false;
    i = 0;
    while (!formValid && i < radioGender.length) {
        if (radioGender[i].checked)formValid = true;
        i++;      
    }
    if(!formValid){ 
        alert("Please ensure that the gender is not empty!");
        return formValid;
    }

    var txtA = doc["textgive"];
    if(trimfield(txtA.value) == '') {      
        alert("Please tell us more!");
        return false;       
    }

    return formValid;
}

function validateFormFind(){
    var doc = document.forms["formFind"];

    var radioType = doc["type"];
    var formValid = false;
    var type;
    var i = 0;
    while (!formValid && i < radioType.length) {
        if (radioType[i].checked){
            formValid = true;
            type = radioType[i].value;
        }else{
            i++; 
        }     
    }
    if(!formValid){ 
        alert("Please ensure that the animal type is not empty!");
        return formValid;
    }

    const cb = document.querySelector('#noneBreed');
    var breed;
    var check = 0;
    formValid = false;
    if(type == 'dog/'){
        breed = doc["dogBreed[]"];
        for(var i = 0; i < breed.length; i++){
            if(breed[i].checked)check++;
        }

        if((check >= 1 && cb.checked == false) || (check == 0 && cb.checked == true)){
            formValid = true;
        }else{
            alert("Please make sure your dog breed selection isn't empty or select the \"Doesn't matter\" option. Only one or the other will work, not both!");
            return formValid;
        }
    }else{
        breed = doc["catBreed[]"];
        for(var i = 0; i < breed.length; i++){
            if(breed[i].checked)check++;
        }

        if((check >= 1 && cb.checked == false) || (check == 0 && cb.checked == true)){
            formValid = true;
        }else{
            alert("Please make sure your cat breed selection isn't empty or select the \"Doesn't matter\" option. Only one or the other will work, not both!");
            return formValid;
        }
    }

    var radioGender = doc["gender"];
    formValid = false;
    i = 0;
    while (!formValid && i < radioGender.length) {
        if (radioGender[i].checked)formValid = true;
        i++;      
    }
    if(!formValid){ 
        alert("Please ensure that the gender is not empty!");
        return formValid;
    }

    return formValid;
}

function validateFormCreate(){
    var doc = document.forms["formCreate"];

    var username = doc["user"];
    var password = doc["pass"];

    if(!/^[a-zA-Z0-9]+$/.test(username.value)){
        formValid = false;
        alert("Please ensure that the username is in a valid format");
        return false;
    }

    if(/^(?=.*[!@#$%^&*])/.test(password.value)){
        formValid=false;
        alert("Please ensure that the password does not contain special characters.");
        return false;
    }else if(!/^((?=.*[a-z])|(?=.*[A-Z]))(?=.*[0-9])(?=.{4,})/.test(password.value)){
        formValid=false;
        alert("Please ensure that the password contains at least 1 character and 1 digit and is at least 4 characters long.");
        return false;
    }
    return true;
}

function trimfield(str) 
{ 
    return str.replace(/^\s+|\s+$/g,''); 
}