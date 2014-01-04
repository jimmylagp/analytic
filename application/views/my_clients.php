    
    <div class="row">
      <div class="small-4 large-centered columns">
        <h2>My Clients</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="small-10 large-centered columns">
        <p>Your clients. Here you can access to a client and administer them.</p>
        <table>
          <thead>
            <tr>
              <th width="250">Name</th>
              <th width="200">E-mail</th>
              <th width="150">Address</th>
              <th width="150">Phone</th>
              <th width="150">City</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($clients as $key => $value) { ?>
            <tr>
              <td><?php echo @$value->name.' '.$value->last_name; ?></td>
              <td><?php echo @$value->email; ?></td>
              <td><?php echo @$value->address; ?></td>
              <td><?php echo @$value->phone; ?></td>
              <td><?php echo @$value->city; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <a href="/index.php/clients/create_client" title="Create a New Client" class="button left">Create a New Client</a>
        <a href="/index.php/campaigns" title="My Campaigns" class="button right">My Campaigns</a>
      </div>
    </div>
