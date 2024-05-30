const registerForm = document.getElementById("registerForm");

registerForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const registerData = new FormData(registerForm);

  fetch("../Controller/register.controller.php", {
    method: "POST",
    body: registerData,
  })
    .then((response) => response.json())
    .then((data) => {
      // for inline error
      // const error = document.getElementById("error");
      // error.innerText = data.errors;
      if (!data.success) {
        alert(data.errors);
      } else {
        window.location.href = "login.php";
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
