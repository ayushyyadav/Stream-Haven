function validateForm(form) {
  // Check if the name field is empty
  if(form.name.value == ""){
    alert("Name cannot be empty");
    return false;
  }

  // Check if the email field is empty or not in the correct format
  if(form.email.value == "" || !form.email.value.includes("@")){
    alert("Please enter a valid email address");
    return false;
  }

  // Check if the password field is empty
  if(form.psw.value == ""){
    alert("Password cannot be empty");
    return false;
  }

  // Check if the confirm password field is empty or does not match the password
  if(form.cpsw.value == "" || form.cpsw.value != form.psw.value){
    alert("Passwords do not match");
    return false;
  }

  // Check if the mobile number field is empty or not numeric
  if(form.mobile.value == "" || isNaN(form.mobile.value)){
    alert("Please enter a valid mobile number");
    return false;
  }

  return true;
}

document.getElementById("subscribeForm").addEventListener("submit", function(event){
  var form = this;

  if(!validateForm(form)) {
    event.preventDefault(); // Prevent form submission
  }
});