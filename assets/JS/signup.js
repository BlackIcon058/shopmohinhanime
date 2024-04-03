// validation form register and register user local storage
const inputUsernameRegister = document.querySelector(".input-signup-username");
const inputPasswordRegister = document.querySelector(".input-signup-password");
const inputFullnameRegister = document.querySelector(".input-signup-fullname");
const inputPhonenumberRegister = document.querySelector(".input-signup-phonenumber");
const inputAddressRegister = document.querySelector(".input-signup-address");
const btnRegister = document.querySelector(".signup__signInButton");

// validation form register and register user local storage

btnRegister.addEventListener("click", (e) => {
  e.preventDefault();
  if (
    inputUsernameRegister.value === "" ||
    inputPasswordRegister.value === "" ||
    inputFullnameRegister.value === "" ||
    inputPhonenumberRegister.value === "" ||
    inputAddressRegister.value === ""
  ) {
    alert("Please do not leave it blank");
  } else {
    // array user
    const user = {
      username: inputUsernameRegister.value,
      password: inputPasswordRegister.value,
    };
    let json = JSON.stringify(user);
    localStorage.setItem(inputUsernameRegister.value, json);
    alert("Sign up successful");
    window.location.href = "login.html";
  }
});
