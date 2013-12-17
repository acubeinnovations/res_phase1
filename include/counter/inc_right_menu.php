    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
<?php if(isset($_SESSION[SESSION_TITLE.'counter_userid']) && $_SESSION[SESSION_TITLE.'counter_userid'] > 0){ ?>
        <li class="divider"></li>
        <li class="has-dropdown">
          <a href="#" >Bills & Bills</a>
          <ul class="dropdown">
            <li><label>Bills</label></li>
			<li><a href="#">New Bill</a></li>
			<li><a href="#" data-reveal-id="openedbills" id="opened_bills">Bill on Hold</a></li>
            <li class="has-dropdown">
              <a href="#" class="">Daily & Mothly Bills</a>
              <ul class="dropdown">
                <li><a href="#">Daily Bills</a></li>
                <li><a href="#">Daily Cancelled</a></li>
                <li><a href="#">-------- Monthly -------</a></li>
                <li><a href="#">Monthly Bills</a></li>
                <li><a href="#">Monthly Cancelled</a></li>
              </ul>
            </li>

            <li class="divider"></li>
            <li><label>Menu And Items</label></li>
            <li><a href="#">Daily Available Items</a></li>
            <li><a href="#">Items From Master Kitchen</a></li>
            <li class="divider"></li>
            <li><a href="#">See all →</a></li>
          </ul>
        </li>


        <li class="divider"></li>

        <li class="has-dropdown">
          <a href="#">Counter</a>
          <ul class="dropdown">
            <li><a href="#">Change Password</a></li>
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
