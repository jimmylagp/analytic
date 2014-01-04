    
    <div class="row">
      <div class="small-4 large-centered columns">
        <h2>My Campagins</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="small-8 large-centered columns">
        <p>Your campaigns related with clients and websites. Here you can access to a campaign and administer them.</p>
        <table width="100%">
          <thead>
            <tr>
              <th width="40%">Name</th>
              <th width="30%">Client</th>
              <th width="30%">Websites</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($campaigns as $value) { ?>
            <tr>
              <td><?php echo @$value['name']; ?></td>
              <td><?php echo @$value['client']; ?></td>
              <td><?php echo @$value['webs']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <a href="/index.php/campaigns/create_campaign" title="Create a New Campaign" class="button left">Create a New Campaign</a>
        <a href="/index.php/clients/" title="My Clients" class="button right">My Clients</a>
      </div>
    </div>
