<?php
require __DIR__ . '/vendor/autoload.php';
$page = "Registration";
if (isset($_POST['reg'])) {
  $db = new MysqliDb();
  if ($_POST['pass1'] == $_POST['pass2']) {
    $data = [
      'name' => $db->escape($_POST['firstname']) . " " . $db->escape($_POST['lastname']),
      'email' => $db->escape($_POST['email']),
      'password' => password_hash($_POST['pass1'], PASSWORD_DEFAULT),
      'role' => "1"
    ];
    if ($db->insert("users", $data)) {
      header("location:login.php");
    } else {
      $message = "Regitration failed!!";
    }
  }
}
?>

<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

  <?php require __DIR__ . '/components/menubar.php'; ?>
  <!-- Breadcrumb Section Begin -->
  <div class="breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-text">
            <h2>Registration</h2>
            <div class="bt-option">
              <a href="index.php">Home</a>
              <span>Registration</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Section End -->


  <?php require __DIR__ . '/components/dismissalert.php'; ?>
  <div class="container">


    <!-- registration form start -->
    <div class="col-lg-7 offset-lg-1 pb-5">
      <form class="row g-3 needs-validation contact-form" novalidate method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="row">
          <div class="col-lg-12">
            <label for="firstname" class="form-label">First name</label>
            <input type="text" class="form-control" name="firstname" id="firstname" value="" required placeholder="first name">


            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-lg-12">
            <label for="lastname" class="form-label">Last name</label>
            <input type="text" class="form-control" name="lastname" id="lastname" value="" required placeholder="last name">


            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-lg-12">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" required placeholder="Email">

            <div class="invalid-feedback">
              Please Enter your Email
            </div>
          </div>
          <div class="col-lg-12">
            <label for="pass1" class="form-label">Password</label>
            <input type="password" minlength="5" class="form-control" id="pass1" name="pass1" required placeholder="password">

            <div class="invalid-feedback">
              Please provide a valid password.
            </div>
          </div>
          <div class="col-lg-12">
            <label for="pass2" class="form-label">Retype Password</label>
            <input type="password" minlength="5" class="form-control" id="pass2" name="pass2" required placeholder="retype password">

            <div class="invalid-feedback">
              Please provide a valid length password.
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-check">

              <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
              </label>
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <div class="col-lg-12">

            <button type="submit" name="reg" value="Sign Up">Register</button>
          </div>
        </div>
      </form>
    </div>
    <!-- registration form end -->

  </div>


  <script>

  </script>
  <?php require __DIR__ . '/components/footer.php'; ?>