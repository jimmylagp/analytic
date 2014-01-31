    
    <div class="row">
      <div class="small-4 large-centered columns">
        <h2>My Websites</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="small-9 large-centered columns">
        <p>Here you can access to a websites and administer them.</p>
        <table width="100%">
          <thead>
            <tr>
              <th width="35%">Domain</th>
              <th width="10%">Visits</th>
              <th width="30%">Tracking Code</th>
              <th width="25%"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($websites as $key => $value) { ?>
            <tr>
              <td><?php echo @$value['domain']; ?></td>
              <td><?php echo @$value['visits']; ?></td>
              <td>
                <textarea>
&#60;script type="text/javascript"&#62;

  var _at = '<?php echo $encrypts->encode(@$value['id_web']); ?>';

  (function() {
    var at = document.createElement('script'); at.type = 'text/javascript'; at.async = true;
    at.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://') + 'analytic:8888/assets/js/tracking.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(at, s);
  })();
&#60;/script&#62;
                </textarea>
              </td>
              <td>
                <?php
                if ($value['visits'] > 0) {
                ?>
                <a href="<?php echo $_SERVER['PHP_SELF'];  ?>/show_website/<?php echo @$value['id_web']; ?>" class="button tiny" title="Show me">Show me</a>
                <?php
                }else{
                ?>
                <a href="#" class="button tiny disabled" title="Show me">Show me</a>
                <?php
                }
                ?>
                <a href="<?php echo $_SERVER['PHP_SELF'];  ?>/delete_website/<?php echo @$value['id_web']; ?>" class="button tiny" title="Delete">Delete</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <a href="/index.php/campaigns/create_campaign" title="Create a New Campaign" class="button left">Create a New Campaign</a>
        <a href="/index.php/clients/" title="My Clients" class="button right">My Clients</a>
      </div>
    </div>
