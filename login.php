<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require __DIR__ . '/vendor/autoload.php';
$page = "Login";
if (isset($_POST['login'])) {
  $db = new MysqliDb();
  $db->where("email", $_POST['email']);
  $row = $db->getOne("users");
  if ($row) {
    if (password_verify($_POST['pass1'], $row['password'])) {
      $_SESSION['loggedin'] = true;
      $_SESSION['userid'] = $row['id'];
      $_SESSION['username'] = $row['name'];
      $_SESSION['role'] = $row['role'];
      if ($row['role'] == "2") {
        header('Location:admin/');
      } elseif ($row['role'] == "1") {
        header('Location:index.php');
      } else {
        header('Location:index.php');
      }
    } else {
      $message = "Passwords do not match";
    }
  } else {
    $message = "Invalid Account";
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
            <h2>Sign In</h2>
            <div class="bt-option">
              <a href="index.php">Home</a>
              <span>Sign In</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Section End -->

  <?php require __DIR__ . '/components/dismissalert.php'; ?>
  <!--  -->
  <div class="container">

    <!-- login form start -->
    <div class="col-lg-6 pb-5 offset-lg-3">
      <form class="row g-3 needs-validation contact-form" novalidate method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="row">
          <div class="col-lg-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="yourname@domain.com">

            <div class="invalid-feedback">
              Please provide a valid email.
            </div>
            <div class="valid-feedback">
              Email Valid!!
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

            <button type="submit" name="login">Sign In</button>
          </div>
        </div>
      </form>
    </div>
    <!-- login form end -->

  </div>

  <script>

  </script>
  <?php require __DIR__ . '/components/footer.php'; ?>