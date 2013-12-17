
  
  <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="divider"></li>
        <?php if(isset($_SESSION[SESSION_TITLE.'admin_userid']) && $_SESSION[SESSION_TITLE.'admin_userid'] > 0){ ?>
       	 <li class="has-dropdown">
          <a href="#" >Administrator</a>
          <ul class="dropdown">
			<li><a href="settings.php">Settings</a></li>
			<li><a href="change_password.php" data-reveal-id="change_password" id="change_password">Change Password</a></li>      
          </ul>
        </li>
 		<li class="has-dropdown">
          <a href="#" >Items & Category</a>
          <ul class="dropdown">
			<li><a href="settings.php">Settings</a></li>
			<li><a href="change_password.php" data-reveal-id="change_password" id="change_password">Change Password</a></li>      
          </ul>
        </li>


          <?php } ?>
			

        <li class="divider"></li>
        <?php if(isset($_SESSION[SESSION_TITLE.'admin_userid']) && $_SESSION[SESSION_TITLE.'admin_userid'] > 0){ ?>
			 <li><a href="logout.php"  >Logout</a></li>

		<?php } else {?>

        <li><a href="index.php"  >Login</a></li>
		<?php }?>
      </ul>
    </section>




