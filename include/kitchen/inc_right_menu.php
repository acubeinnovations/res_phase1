    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">

	<?php if(isset($_SESSION[SESSION_TITLE.'kitchen_userid']) && $_SESSION[SESSION_TITLE.'kitchen_userid'] > 0){ ?>

        <li class="divider"></li>
		<li class="active"><a href="dashboard.php" >Active Orders</a></li>
		<li><a href="view_orders.php">All Orders</a></li>

        <li class="divider"></li>

        <li class="has-dropdown">
          <a href="#">Kitchen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <ul class="dropdown">
            <li><a href="change_password.php">Change Password</a></li>
            <li class="divider"></li>

          </ul>
        </li>


        <li class="divider"></li>

          <?php } ?>

        <li class="divider"></li>
         <?php if(isset($_SESSION[SESSION_TITLE.'kitchen_userid']) && $_SESSION[SESSION_TITLE.'kitchen_userid'] > 0){ ?>
			   <li><a href="logout.php"  >Logout</a></li>
         <?php } else {?>
          <li><a href="index.php"  >Login</a></li>

          <?php }?>


      </ul>
    </section>
