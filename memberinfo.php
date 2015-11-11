<?php

include( "checkLogin.php");
include( "classes/member.class.php");

if( isset( $_POST["action"])){
  if( $_POST["action"] == "changepw"){
    $message = "The password is updated.";
    try{
      updatePassword();
    } catch (Exception $e){
      $message=$e->getMessage();
    }
  }
}



function updatePassword(){
  
    if( $_POST["action"] == "changepw"){
      if( $_POST["newPw"] != $_POST["repeatNewPw"]){
        throw new Exception ("The new password and repeat password does not match!");
      }
      $memobj = new member();
      if(! $memobj -> checkPassword( $_SESSION['id'], $_POST["currentPw"] )){
        throw new Exception("Password does not match with the password in our record!");
      }

      if(! $memobj -> updatePassword( $_SESSION['id'], $_POST["newPw"] )){
        throw new Exception("Update password failed: ".$memobj->getError());
      }
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member Information</title>
    
    <link rel="stylesheet" type="text/css" href="demo.css" media="screen" />
    
</head>

<body>

<div id="main">
  <div class="container">
    <h1>Hello, <?php echo $_SESSION['usr'];?>! </h1>
  </div>
  
  <div>
    <h2>Change password</h2>
    <div>
      <p class="message"><?php if( isset( $message)) echo $message;?></p>
    </div>
    <form method = "POST">
      Current Password: <input type="password" name="currentPw"><br/>
      New Password:  <input type="password" name="newPw"><br/>
      Repeat New Password:  <input type="password" name="repeatNewPw"><br/>
      <input type="hidden" name="action" value="changepw"/>
      <button>Update Password</button>
    </form>
  </div>

  <div class="container tutorial-info">
  This is Footer.    </div>
</div>


</body>
</html>
