    
    <div class="row">
      <div class="small-4 large-centered columns">
        <h2>Edit my profile</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="large-3 columns">
        
        <?php if(!empty($user->picture)){ ?>
        <img src="/pictures/<?php echo $user->picture ?>">
        <?php }else {?>
        <img src="/assets/img/no-avatar.png">
        <?php } ?>

      </div>
      <div class="large-5 columns">
        <form method="POST" enctype="multipart/form-data">

          <div class="row">
            <div class="large-4 columns">
              <label for="name">First Name: </label>
            </div>
            <div class="large-8 columns">
              <input type="text" name="name" value="<?php echo $user->name; ?>">
            </div>
          </div>
          <div class="row">
            <div class="large-4 columns">
              <label for="last_name">Last Name: </label>
            </div>
            <div class="large-8 columns">
              <input type="text" name="last_name" value="<?php echo $user->last_name; ?>">
            </div>
          </div>
          <div class="row">
            <div class="large-4 columns">
              <label for="email">E-mail: </label>
            </div>
            <div class="large-8 columns">
              <input type="text" name="email" value="<?php echo $this->user->email; ?>">
            </div>
          </div>
          <div class="row">
            <div class="large-4 columns">
              <label for="birthday">Birthday: </label>
            </div>
            <div class="large-8 columns">
              <input type="date" name="birthday" value="<?php echo date('Y-m-d',strtotime($user->birthday)); ?>">
            </div>
          </div>
          <div class="row">
            <div class="large-4 columns">
              <label for="genger">Gender: </label>
            </div>
            <div class="large-8 columns">
              <input type="radio" name="gender" value="male" <?php if($user->gender == 'male') echo 'checked="checked"'; ?>> Male
              <input type="radio" name="gender" value="female" <?php if($user->gender == 'female') echo 'checked="checked"'; ?>> Female
              <input type="radio" name="gender" value="other" <?php if($user->gender == 'other') echo 'checked="checked"'; ?>> Other
            </div>
          </div>
          <div class="row">
            <div class="large-4 columns">
              <label for="city">City: </label>
            </div>
            <div class="large-8 columns">
              <input type="text" name="city" value="<?php echo $user->city; ?>">
            </div>
          </div>
          <div class="row">
            <div class="large-4 columns">
              <label for="occupation">Occupation: </label>
            </div>
            <div class="large-8 columns">
              <input type="text" name="occupation" value="<?php echo $user->occupation; ?>">
            </div>
          </div>
          <div class="row">
            <div class="large-4 columns">
              <label for="phone">Telephone: </label>
            </div>
            <div class="large-8 columns">
              <input type="text" name="phone" value="<?php echo $user->phone; ?>">
            </div>
          </div>
          <div class="row">
            <div class="large-4 columns">
              <label for="address">Address: </label>
            </div>
            <div class="large-8 columns">
              <textarea name="address"><?php echo $user->address; ?></textarea>
            </div>
          </div>
          <div class="row">
            <div class="large-4 columns">
              <label for="avatar">Avatar: </label>
            </div>
            <div class="large-8 columns">
              <input type="file" name="avatar">
            </div>
          </div>
          <input type="hidden" name="picture" value="<?php echo $user->picture; ?>">
          <input type="submit" class="button" value="Update">
        </form>
      </div>
      <div class="large-4 columns"></div>
    </div>
