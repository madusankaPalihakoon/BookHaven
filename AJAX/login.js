const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const loginData = new FormData(loginForm);

  fetch("../Controller/login.controller.php", {
    method: "POST",
    body: loginData,
  })
    .then((response) => response.json())
    .then((data) => {
      // for inline error
      // const error = document.getElementById("error");
      // error.innerText = data.errors;
      if (!data.success) {
        alert(data.errors);
      } else {
        window.location.href = "book-store.php";
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
