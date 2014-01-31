<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Analytic</title>
    <link rel="stylesheet" href="/assets/css/foundation.css" />
    <link rel="stylesheet" href="/assets/css/app.css" />
    <script src="/assets/js/modernizr.js"></script>
  </head>
  <body>

    <div id="header" class="row">
      <div class="large-3 columns">
        <h1><a href="/" title="ANALYTIC">ANALYTIC</a></h1>
      </div>
      <div class="large-9 columns">
        <br>
        <ul class="inline-list">
          <li><a href="/" title="Home">Home</a></li>
          <li><a href="/" title="My Profile">My Profile</a></li>
          <li><a href="/index.php/websites" title="My Web Sites">My Web Sites</a></li>
          <li><a href="/index.php/campaigns" title="My Campaigns">My Campaigns</a></li>
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
    <script src="/assets/js/app.js"></script>
    <script>
      $(document).foundation();
    </script>
    <script type="text/javascript">

      /*var _at = 'W82KV4iPDdsQNG8QZRr7HVZuGbixjRlPo/vcjopfwgb6EsfwUu+RUcNKnxlmHy2NAm8thvwQ1V6FKHPRWgBK6w==';

      (function() {
        var at = document.createElement('script'); at.type = 'text/javascript'; at.async = true;
        at.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://') + 'analytic:8888/assets/js/tracking.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(at, s);
      })();*/
    </script>
                
  </body>
</html>
