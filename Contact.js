function validate(formObj) {
   if (formObj.Name.value == "") {
      alert("Please enter your name.");
      formObj.Name.focus();
      return false;
   }
   if (formObj.Mail.value == "") {
      alert("Please enter your e-mail address.");
      formObj.Mail.focus();
      return false;
   }
   if (formObj.Message.value == ""||formObj.Message.value == "Please enter your message") {
      alert("Please enter your message.");
      formObj.Message.focus();
      return false;
   }else{
   alert("Success!");
   return true;}
   }

function clearComment(element){
    if(element.value == "Please enter your message"){
       element.value = '';
    }
}