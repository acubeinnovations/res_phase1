    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
<?php if(isset($_SESSION[SESSION_TITLE.'counter_userid']) && $_SESSION[SESSION_TITLE.'counter_userid'] > 0){ ?>
        <li class="divider"></li>
        <li>
         <a href="#" data-reveal-id="openedbills" id="opened_bills">Bill on Hold</a>
          
        </li>


        <li class="divider"></li>

        <li class="has-dropdown">
          <a href="#">Counter</a>
          <ul class="dropdown">
            <li><a href="change_password.php">Change Password</a></li>
            <li class="divider"></li>
            <li><a href="#">See all →</a></li>
          </ul>
        </li>

<?php } ?>
        <li class="divider"></li>
         <?php if(isset($_SESSION[SESSION_TITLE.'counter_userid']) && $_SESSION[SESSION_TITLE.'counter_userid'] > 0){ ?>
			   <li><a href="logout.php"  >Logout</a></li>
         <?php } else {?>
          <li><a href="index.php"  >Login</a></li>

          <?php }?>



      </ul>
    </section>
