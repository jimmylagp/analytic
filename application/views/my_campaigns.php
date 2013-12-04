    
    <div class="row">
      <div class="small-4 large-centered columns">
        <h2>My Campagins</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="small-8 large-centered columns">
        <p>Your campaigns related with clients and websites. Here you can access to a campaign and administer them.</p>
        <table>
          <thead>
            <tr>
              <th width="250">Name</th>
              <th width="250">Client</th>
              <th>Websites</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach ($campaigns as $value) { ?>
              <td><?php echo $value['name']; ?></td>
              <td><?php echo $value['client']; ?></td>
              <td><?php echo $value['webs']; ?></td>
              <?php } ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
