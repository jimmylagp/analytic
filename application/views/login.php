<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Analytic</title>
    <link rel="stylesheet" href="/assets/css/foundation.css" />
    <script src="/assets/js/modernizr.js"></script>
  </head>
  <body>

    <div class="row">
      <div class="small-4 large-centered columns">
        <h1><a href="/" title="ANALYTIC">ANALYTIC</a></h1>
        <?php if(@$error_login): ?>
        <span class="alert label">Error in e-mail or password</span>
        <?php endif; ?>

        <?php echo @validation_errors(); ?>

        <form method="POST">
          <label for="email">E-mail:</label>
          <input type="text" name="email">
          <label for="Password">Password:</label>
          <input type="password" name="password">
          <div class="clearfix">
            <input type="submit" class="button left" value="Login">
            <a href="/index.php/welcome/create_account" class="button right">Create Account</a>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="small-4 large-centered columns">
        <p><a href="#" title="Forgot my password">Forgot my password</a></p>
      </div>
    </div>
    
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
