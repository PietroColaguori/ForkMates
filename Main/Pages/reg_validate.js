function validateUsername(username) {
  //cycles the database and checks for doubles
  return true
}

function validateEmail(email) {
  var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
  if(email.match(regex)) {
    return true
  }
  else return false
}

function validatePassword(password) {
  var regex = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/
  if(password.match(regex)) {
    return true
  }
  else return false
}

function formValidation() {

  var username = document.getElementById("username").value
  if(! validateUsername(username)) {
    alert("Username " + username + " already taken")
    return false
  }

  var email = document.getElementById("email").value
  if(! validateEmail(email)) {
    alert("Invalid email")
    return false
  }

  var password1 = document.getElementById("password")
  var password2 = document.getElementById("passwordd")
  if(password1.value != password2.value) {
    alert("Passwords do not match")
    return false
  }
  if(! validatePassword(password1.value)) {
    alert("Password must be at least 6 digits long, contain at least one uppercase letter and contain at least one digit")
    return false
  }

  return true
}

function loginValidation() {
  // controlla che coppia (email, password) sia nel database
  var email = document.getElementById("email").value
  if(! validateEmail(email)) {
    alert("Invalid email")
    return false
  }

  return true

}
