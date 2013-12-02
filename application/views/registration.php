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
        
        <?php if(!@$regist_success){ ?>
        <?php echo @validation_errors(); ?>

        <form method="POST">
          <label for="email">E-mail:</label>
          <input type="text" name="email">
          <label for="Password">Password:</label>
          <input type="password" name="password">
          <label for="Password">Password Again:</label>
          <input type="password" name="repassword">
          <div class="clearfix"><input type="submit" class="button left" value="Create Account"></div>
        </form>
        <?php }else{ ?>
        <p>You are registered successfully, in minutes will arrive a e-mail to your account.</p>
        <?php } ?>
      </div>
    </div>
    <div class="row">
      <div class="small-4 large-centered columns">
        <p><a href="/">I want to login</a></p>
      </div>
    </div>
    
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
