<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodePen - login-signup</title>
  <link rel="icon" href="<?= BASE_URL ?>assets/img/uc.png">
</head>

<body>
  <div id="background">
    <div id="panel-box">
      <div class="panel">
        <div class="auth-form on" id="login">
          <div id="form-title">Log In</div>
          <form action="<?= site_url('auth.php?action=login') ?>" method="POST">
            <input style="margin-top: 20px;" name="email" type="text" required="required" placeholder="Email" />
            <br>
            <input style="margin-top: 20px;" name="password" type="password" required="required" placeholder="Password" />
            <br>
            <?php if ($alert == 1) : ?>
              <h5>Log in to access the account</h5>
            <?php elseif ($alert == 2) : ?>
              <h3>Operation Faile</h3>
            <?php endif; ?>
            <button style="margin-top: 20px;" type="Submit">Log In</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>