
  <?php if(isset($_SESSION[SESSION_TITLE.'admin_userid']) && $_SESSION[SESSION_TITLE.'admin_userid'] > 0){ ?>

  <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="divider"></li>
        <li class="has-dropdown">
          <a href="#" >Administrator</a>
          <ul class="dropdown">
			<li><a href="settings.php">Settings</a></li>
			<li><a href="change_password.php" data-reveal-id="change_password" id="change_password">Change Password</a></li>
            <li class="has-dropdown">
            <li class="divider"></li>
            
            
       
            <li class="divider"></li>
            <li><a href="#">See all →</a></li>
          </ul>
        </li>
		<?php }else{ ?>
			<a  href="index.php" title="Login">Login</a>
			<?php } ?>

  


        <li class="divider"></li>
        <li><a href="logout.php"  >Logout</a></li>

      </ul>
    </section>




