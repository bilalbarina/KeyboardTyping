const apiEndpoint = "http://localhost:8000/api/";
document.getElementById("login-button").addEventListener("click", function () {
  const username = document.getElementById("login-username").value;
  if (username) {
    $.ajax(apiEndpoint + "create-score", {
      method: "POST",
      data: {
        username: username,
      },
      accepts: "json",
      success: () => {
        window.localStorage.setItem("username", username);
        window.location.href = "practice.php";
      },
      error: (res) => alert(res.responseJSON.error),
    });
  } else {
    alert("Please enter a username");
  }
});
