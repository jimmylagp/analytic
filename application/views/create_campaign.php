    
    <div class="row">
      <div class="small-5 large-centered columns">
        <h2>Create a New Campagin</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="small-4 large-centered columns">
        <?php echo @$success; ?>
        <?php echo @validation_errors(); ?>
        <form method="POST">
        	<div class="row">
        		<div class="large-3 columns">
        			<label for="name">Name:</label>
        		</div>
        		<div class="large-9 columns">
		        	<input type="text" name="name">
        		</div>
        	</div>
        	<div class="row">
        		<div class="large-3 columns">
		        	<label for="website">Web Site:</label>
        		</div>
        		<div class="large-9 columns">
		        	<textarea name="website"></textarea>
        		</div>
        	</div>
        	<div class="row">
        		<div class="large-3 columns">
        			<label for="client">Client:</label>
        		</div>
        		<div class="large-9 columns">
        			<select name="client">
                        <option value=""></option>
                        <?php foreach ($clients as $value) { ?>
        				<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                        <?php } ?>
        			</select>
        		</div>
        	</div>
        	<input type="submit" class="button left" value="Create">
            <a href="/index.php/campaigns" title="My Campaigns" class="button right">My Campaigns</a>
        </form>
      </div>
    </div>
