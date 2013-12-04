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

    <div id="header" class="row">
      <div class="large-3 columns">
        <h1><a href="/" title="ANALYTIC">ANALYTIC</a></h1>
      </div>
      <div class="large-9 columns">
        <ul class="inline-list">
          <li><a href="/" title="Home">Home</a></li>
          <li><a href="/welcome/" title="My Profile">My Profile</a></li>
          <li><a href="/" title="My Web Sites">My Web Sites</a></li>
          <li><a href="/" title="My Campaigns">My Campaigns</a></li>
          <li><a href="/index.php/welcome/logout" title="Logout">Logout</a></li>
        </ul>
      </div>
    </div>

    <?php $this->load->view($content); ?>

    <div id="footer" class="row">
      <div class="small-4 large-centered columns">
        <p><a href="/" title="ANALYTIC">ANALYTIC</a></p>
      </div>
    </div>
    
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>