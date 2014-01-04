    
    <div class="row">
      <div class="small-5 large-centered columns">
        <h2>Create a New Client</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="small-5 large-centered columns">
        <?php echo @$success; ?>
        <?php echo @validation_errors(); ?>
        <form method="POST">
        	<div class="row">
        		<div class="large-4 columns">
        			<label for="name">Name:</label>
        		</div>
        		<div class="large-8 columns">
		        	<input type="text" name="name">
        		</div>
        	</div>
            <div class="row">
                <div class="large-4 columns">
                    <label for="last_name">Last Name:</label>
                </div>
                <div class="large-8 columns">
                    <input type="text" name="last_name">
                </div>
            </div>
        	<div class="row">
        		<div class="large-4 columns">
		        	<label for="email">E-mail:</label>
        		</div>
        		<div class="large-8 columns">
		        	<input type="email" name="email">
        		</div>
        	</div>
        	<div class="row">
        		<div class="large-4 columns">
        			<label for="address">Address:</label>
        		</div>
        		<div class="large-8 columns">
        			<textarea name="address"></textarea>
        		</div>
        	</div>
            <div class="row">
                <div class="large-4 columns">
                    <label for="phone">Phone:</label>
                </div>
                <div class="large-8 columns">
                    <input type="number" name="phone">
                </div>
            </div>
            <div class="row">
                <div class="large-4 columns">
                    <label for="city">City:</label>
                </div>
                <div class="large-8 columns">
                    <input type="text" name="city">
                </div>
            </div>
        	<input type="submit" class="button left" value="Create">
            <a href="/index.php/clients" title="My Clients" class="button right">My Clients</a>
        </form>
      </div>
    </div>
