//This will validate the input data

function checkboxvalidate() {
  var group =
}

function validation() {
  var fname = document.getElementById("fname").value;
  var title = document.getElementById("title").value;
  var price = document.getElementById("price").value;
  var description = document.getElementById("description").value;
  var alertmessage = "";
  var successmessage = "Successfully Submitted!";

  if (fname == "") {
    alertmessage += "You must enter a your full name \n";
  }

  if (title == "") {
    alertmessage += "You must enter a title \n";
  }

  if (price == "") {
    alertmessage += "You must enter a price \n";
  }

  if (description == "") {
    alertmessage += "You must enter a description \n";
  }
