    
    <div class="row">
      <div class="small-4 large-centered columns">
        <h2>My Campaigns</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="small-8 large-centered columns">
        <p>Your campaigns related with clients and websites. Here you can access to a campaign and administer them.</p>
        <table width="100%">
          <thead>
            <tr>
              <th width="40%">Name</th>
              <th width="40%">Client</th>
              <th width="10%">Websites</th>
              <th width="10%"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(!empty($campaigns)){ 
              foreach($campaigns as $value) { 
            ?>
            <tr>
              <td><?php echo @$value['name']; ?></td>
              <td><?php echo @$value['client']; ?></td>
              <td><?php echo @$value['webs']; ?></td>
              <td>
                <a href="<?php echo $_SERVER['PHP_SELF'];  ?>/delete_campaign/<?php echo @$value['id']; ?>" class="button tiny" title="Show me">Delete</a>
              </td>
            </tr>
            <?php 
              }
            } 
            ?>
          </tbody>
        </table>
        <a href="/index.php/campaigns/create_campaign" title="Create a New Campaign" class="button left">Create a New Campaign</a>
        <a href="/index.php/clients/" title="My Clients" class="button right">My Clients</a>
      </div>
    </div>
