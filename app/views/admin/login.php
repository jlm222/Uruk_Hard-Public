<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="robots" content="noindex, nofollow" />
<title>Login</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!-- Custom CSS -->
<link href="<?= URLROOT; ?>/css/admin/login.css" rel="stylesheet">

</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto mb-5">
      <header class="header">
          <div class="header__logo-box">
              <a href="<?= URLROOT; ?>" class="header__link"><img src="<?= LOGOFOLDER; ?>logo.jpg" alt="Uruk Hard Play Hard Logo" class="header__logo"></a>
          </div>
      </header>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mx-auto">
      <main class="form-signin card card-body bg-light">
        <form action="<?= URLROOT; ?>/users/login" method="POST">
          <h1 class="h2 mb-3 fw-normal">Login</h1>
          <p>Please fill in your credentials to log in</p>

          <div class="form-group">
            <label for="inputUsername" class="visually-hidden">Username</label>
            <input type="text" id="inputUsername" class="form-control form-control-lg <?= !empty($data['username_err'] ) || !empty($data['err']) ? 'is-invalid' : ''; ?>" placeholder="Username" required autofocus name="username" value="<?= $data['username']; ?>">
            <span class="invalid-feedback"><?= $data['username_err']; ?></span>
          </div>

          <div class="form-group">
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" id="inputPassword" class="form-control form-control-lg <?= !empty($data['password_err'] ) || !empty($data['err']) ? 'is-invalid' : ''; ?>" placeholder="Password" required name="password" value="<?= $data['password']; ?>">
            <span class="invalid-feedback"><?= $data['password_err']; ?></span>
          </div>

          <div class="row">
            <div class="col">
              <button class="w-100 btn btn-lg btn-primary btn-success" type="submit" name="login">Login</button>
            </div>
          </div>
        </form>
      </main>
    </div>
  </div>

</div>

</body>
</html>
