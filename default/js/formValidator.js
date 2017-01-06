$().ready(function() {
  // validate signup form on keyup and submit
  $("#signupForm").validate({
    rules: {
      username: {
        required: true,
        minlength: 6
      },
      password: {
        required: true,
        minlength: 5
      },
      confirm_password: {
        required: true,
        minlength: 5,
        equalTo: "#password"
      },
      email: {
        required: true,
        email: true
      },
      captcha: {
        required: true,
        minlength: 5,
        maxlength: 5
      },
      agree: "required"
    },
    messages: {
      username: {
        required: "Please enter a username",
        minlength: "Your username must consist of at least 6 characters"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      confirm_password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
        equalTo: "Please enter the same password as above"
      },
      email: "Please enter a valid email address",
      agree: "Please accept our policy"
    }
  });
});
