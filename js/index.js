$(document).ready(function(){

    var pass = $("#password");
    var cpass = $("#cpassword");

    function checkPasswordsMatch() {
        if (pass.val() !== cpass.val()) {
           alert("Passwords don't match!");
           return false;
        }
        else return true;
        
    }

    $("#regform").on("submit", function(event) { 
        if (!checkPasswordsMatch()) {
            event.preventDefault(); 
        }

    });


  
});