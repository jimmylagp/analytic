
    <div class="row">
      <div class="small-4 large-centered columns">
        <h2>My Websites</h2>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">
        <p><canvas id="line-chart" class="charts"></canvas></p>
      </div>
    </div>
    
    <div class="row">
      <div class="large-12 columns">
        <p>Here you can see the total visits on this year and per filtered.</p>
        
        <dl class="tabs" data-tab>
          <dd class="active"><a href="#panel2-1">Browser</a></dd>
          <dd><a href="#panel2-2">OS</a></dd>
          <dd><a href="#panel2-3">Country</a></dd>
          <dd><a href="#panel2-4">Language</a></dd>
        </dl>
        <div class="tabs-content row">
          <div class="content active small-10 large-centered columns" id="panel2-1">
            <table width="100%">
              <thead>
                <tr>
                  <th width="80%">Browser</th>
                  <th width="20%">%</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($browsers as $key => $value) { ?>
                <tr>
                  <td><?php echo $value->browser; ?></td>
                  <td><?php echo $value->visits; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="content small-10 large-centered columns" id="panel2-2">
            <table width="100%">
              <thead>
                <tr>
                  <th width="80%">OS</th>
                  <th width="20%">%</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($os as $key => $value) { ?>
                <tr>
                  <td><?php echo $value->operating_system; ?></td>
                  <td><?php echo $value->visits; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="content small-10 large-centered columns" id="panel2-3">
            <table width="100%">
              <thead>
                <tr>
                  <th width="80%">Country</th>
                  <th width="20%">%</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($country as $key => $value) { ?>
                <tr>
                  <td><?php echo $value->country; ?></td>
                  <td><?php echo $value->visits; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="content small-10 large-centered columns" id="panel2-4">
            <table width="100%">
              <thead>
                <tr>
                  <th width="80%">Language</th>
                  <th width="20%">%</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($language as $key => $value) { ?>
                <tr>
                  <td><?php echo $value->language; ?></td>
                  <td><?php echo $value->visits; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

        
        <a href="/index.php/campaigns/create_campaign" title="Create a New Campaign" class="button left">Create a New Campaign</a>
        <a href="/index.php/clients/" title="My Clients" class="button right">My Clients</a>
      </div>
    </div>
    <?php 
    $stepw = array();
    foreach ($traffic as $key => $value) {
      $stepw[] = $value->visits;
    };

    $max = max($stepw);
    ?>
    <script src="/assets/js/chart.min.js"></script>
    <script>
      var options = {
        scaleOverride: true,
        //Number - The number of steps in a hard coded scale
        scaleSteps : <?php echo round($max/2); ?>,
        //Number - The value jump in the hard coded scale
        scaleStepWidth : <?php echo $max; ?>,
        //Number - The scale starting value
        scaleStartValue : 0
      }

      var lineChartData = {
        labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
        datasets : [
          {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            pointColor : "rgba(151,187,205,1)",
            pointStrokeColor : "#fff",
            data : [<?php foreach ($traffic as $key => $value) {
              echo $value->visits.",";
            } ?>]
          }
        ]
      }

      var myLine = new Chart(document.getElementById("line-chart").getContext("2d")).Line(lineChartData, options);
    </script>
    <script src="/assets/js/app.js"></script>
