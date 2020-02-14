$('#login-submit').click(function(){
    alert("You successfully logged in!!!");
  });

function commentShowHide(postID){
    if($("#comment-area-post-id-"+postID +"").css("display") == "none"){
        $("#comment-area-post-id-"+postID +"").css("display", "block")
    }else{
        $("#comment-area-post-id-"+postID +"").css("display", "none")
    }
}

// make sure password has correct characters and matches password confirmation
function validateRegPassword() {
    $passwordToMatch = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!@#$%^&*()_+={}])[a-zA-Z0-9~!@#$%^&*()_+={}]{8,30}/g; // regex to match against password
    $userInput = $("#reg-password").val();
    $confirmPsw = $("#reg-confirmPassword").val();
    if($userInput.match($passwordToMatch) && $userInput == $confirmPsw) {
      return true;
    }
    return false;
  }

  function validateLoginPassword() {
    $passwordToMatch = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!@#$%^&*()_+={}])[a-zA-Z0-9~!@#$%^&*()_+={}]{8,30}/g; // regex to match against password
    $userInput = $("#exampleInputPassword1").val();
    if($userInput.match($passwordToMatch)) {
      return true;
    }
    return false;
  }

  function ifRegValidSubmit() {
      if(validateRegPassword()){
          $("#reg-form").submit();
      }else{
        $("#psw-reg-alert").css("display", "block");
      }
  }

  function ifLoginValidSubmit() {
    if(validateLoginPassword()){
        $("#login-form").submit();
    }else{
      $("#psw-login-alert").css("display", "block");
    }
}