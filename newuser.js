window.onload = function () { 
   var passwordField = $("password");
   passwordField.onblur = validPassword;
   emptyCheck=document.getElementById("button");
   emptyCheck.onsubmit = validPassword;
};

function validPassword() {
    var errorMessage = $("Error");
    var password = this.value;
    var passwordPatt=/[\d+a-z+A-Z+]/;
    if(!(passwordPatt.test(password))||password.length<8) {
      document.getElementsByTagName("Label")[2].style.color="red";
      errorMessage.innerHTML = "must contain at least one digit, one letter, and one capital letter and is to be at least 8 charaters long.";
      return false;
    }
    else {
      document.getElementsByTagName("Label")[2].style.color="black";
      errorMessage.innerHTML = "";
      return true;
    } 
}


function validate() {
  var passwordField = $("password");
  passwordField.onblur = validPassword;
  if(passwordField){
    alert("New User added");
  }
  return passwordField;
}