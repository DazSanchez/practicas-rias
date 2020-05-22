(w => {
  const onLogin = e => {
    e.preventDefault();

    const username = $("#username").val();
    const password = $("#password").val();

    const $alert = $("#errorAlert");

    $.ajax("/api/controllers/login.php", {
      contentType: "application/json",
      method: "post",
      data: JSON.stringify({
        username,
        password
      }),
      dataType: "json",
      success: () => {
        w.location.href = "/search.php";
      },
      error: ({ responseJSON }) => {
        $alert.text(responseJSON.message);
        $alert.show();
      }
    });
  };

  $(document).ready(() => {
    $("#loginForm").submit(onLogin);
  });
})(window);
