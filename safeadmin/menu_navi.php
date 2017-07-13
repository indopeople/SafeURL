 <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li> 
        <li><a href="<?php echo $urlpanel; ?>/dashboard.php"><i class="fa fa-home text-green"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo $urlpanel; ?>/profile.php"><i class="fa fa-user text-aqua"></i> <span>Profile</span></a></li>
        <li class="header">ADS NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money text-aqua"></i>
            <span>Ads Management</span>
            <span class="pull-right-container">
              <i class="label label-primary pull-right">Open Menu</i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $urlpanel; ?>/ads/top_ads.php"><i class="fa fa-money text-aqua"></i> Iklan Atas</a></li>
            <li><a href="<?php echo $urlpanel; ?>/ads/bot_ads.php"><i class="fa fa-money text-aqua"></i> Iklan Bawah</a></li>
          </ul>
        </li>
        <li class="header">USER NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users text-aqua"></i>
            <span>User Management</span>
            <span class="pull-right-container">
              <i class="label label-primary pull-right">Open Menu</i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $urlpanel; ?>/users/"><i class="fa fa-plus text-aqua"></i> Add User</a></li>
            <li><a href="<?php echo $urlpanel; ?>/users/list_users.php"><i class="fa fa-list text-aqua"></i> List Users</a></li>
          </ul>
        </li>
        <li class="header">LINK NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-link text-aqua"></i>
            <span>Link Management</span>
            <span class="pull-right-container">
              <i class="label label-primary pull-right">Open Menu</i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $urlpanel; ?>/safeurl/"><i class="fa fa-link text-aqua"></i> <span>Create SafeURL</span></a></li>
            <li><a href="<?php echo $urlpanel; ?>/safeurl/list_safeurl.php"><i class="fa fa-list text-aqua"></i> List SafeURL</a></li>
          </ul>
        </li>  
        <li class="header">ARTIKEL NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o text-aqua"></i>
            <span>Artikel Management</span>
            <span class="pull-right-container">
              <i class="label label-primary pull-right">Open Menu</i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $urlpanel; ?>/berita/"><i class="fa fa-circle-o"></i> List Berita</a></li>
          </ul>
        </li>
        <li class="header">Support & Donate</li>
        <li><a href="<?php echo $urlpanel; ?>/support_btc.php"><i class="fa fa-btc text-green"></i> <span>Bitcoin</span></a></li>
        <li><a href="https://github.com/rezerolabs/SafeURL"><i class="fa fa-github text-green"></i> <span>Project on Github</span></a></li>
        <li><a href="mailto:anwaru@indoxploit.or.id"><i class="fa fa-envelope text-green"></i> <span>Information</span></a></li>
      </ul>