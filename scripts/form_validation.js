function signUpvalidateForm() {
  let id = document.getElementById("empidregister").value;
  let email = document.getElementById("emailregister").value;
  let orgName = document.getElementById("orgNameregister").value;
  let password1 = document.getElementById("passwordtype1").value;
  let password2 = document.getElementById("passwordtype2").value;
  if (
    id === "" ||
    email === "" ||
    orgName === "" ||
    password1 === "" ||
    password2 === ""
  ) {
    alert("All fields are mandatory");
    return false;
  }

  var regex = /^[a-zA-Z0-9]+$/;
  if (!regex.test(id) || id.length < 6 || id.length > 10) {
    alert(
      "Employee ID must be a combination of letters and numbers and value of length 6 to 10"
    );
    return false;
  }

  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert("Invalid email format");
    return false;
  }

  var uppercaseRegex = /[A-Z]/;
  var lowercaseRegex = /[a-z]/;
  var specialCharacterRegex = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;

  if (
    uppercaseRegex.test(password1) &&
    lowercaseRegex.test(password1) &&
    specialCharacterRegex.test(password1)
  ) {
  } else {
    alert(
      "Password must contain at least one uppercase letter, one lowercase letter, and one special character."
    );
  }
  if (password1.length < 6 && password1.length > 20) {
    alert("Password should be of length 6 to 20 charcaters");
    return false;
  }

  if (password1 !== password2) {
    alert("Passwords do not match");
    return false;
  }

  console.log("validation done");
  return true;
}

function LoginvalidateForm() {
  let id = document.getElementById("empid").value;
  let password = document.getElementById("passwordInput").value;
  let orgName = document.getElementById("orgName").value;
  console.log("Inside the employee login validation");
  if (id === "" || password === "" || orgName === "") {
    alert("All fields are mandatory");
    return false;
  }

  var regex = /^[a-zA-Z0-9]+$/;

  if (!regex.test(id) || id.length < 6 || id.length > 10) {
    alert(
      "Employee ID must be a combination of letters and numbers and value of length 6 to 10"
    );
    return false;
  }

  var uppercaseRegex = /[A-Z]/;
  var lowercaseRegex = /[a-z]/;
  var specialCharacterRegex = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;

  if (
    uppercaseRegex.test(password) &&
    lowercaseRegex.test(password) &&
    specialCharacterRegex.test(password)
  ) {
  } else {
    alert(
      "Password must contain at least one uppercase letter, one lowercase letter, and one special character."
    );
  }
  if (password.length < 6 || password.length > 20) {
    alert("Password should be of length 6 to 20 charcaters");
    return false;
  }

  return true;
}

function AdminvalidateForm() {
  let id = document.getElementById("adminid").value;
  let password = document.getElementById("passwordInputAdmin").value;
  console.log(id, password);
  if (id === "" || password === "") {
    alert("All fields are mandatory");
    return false;
  }
  var uppercaseRegex = /[A-Z]/;
  var lowercaseRegex = /[a-z]/;
  var specialCharacterRegex = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;

  if (
    uppercaseRegex.test(password) &&
    lowercaseRegex.test(password) &&
    specialCharacterRegex.test(password)
  ) {
  } else {
    alert(
      "Password must contain at least one uppercase letter, one lowercase letter, and one special character."
    );
  }
  if (password.length < 6 || password.length > 20) {
    alert("Password should be of length 6 to 20 charcaters");
    return false;
  }

  return true;
}
