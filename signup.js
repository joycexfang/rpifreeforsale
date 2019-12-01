function validate(formObj) {
   if (formObj.firstname.value == "") {
      alert("Please set your first name.");
      formObj.firstname.focus();
      return false;
   }
    
   if (formObj.lastname.value == "") {
      alert("Please set your last name.");
      formObj.lastname.focus();
      return false;
   }
    
   if (formObj.username.value == "") {
      alert("Please set your username.");
      formObj.username.focus();
      return false;
   }
   
   if (formObj.mail.value == "") {
      alert("Please set your Mail address.");
      formObj.mail.focus();
      return false;
   }
   if (formObj.password.value == "") {
      alert("Please set your password.");
      formObj.mail.focus();
      return false;
   }else{
   alert("Success!");
    window.open("login.html")
   return true;}
   }
