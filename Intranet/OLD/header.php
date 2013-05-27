<header>
    <div class="header_logo">
        <a href="index.php">
        <div id="logo">
            <img src="images/logo.png">
        </div>
        </a>
    </div>
    <div class="header_admin">
        <div class="header_admin_title">Administration panel</div>
        <div class="header_login"><!--<img src="<?php //echo BASE;?>intranet/images/account_ico.png">My account--> <a onClick="location.href='<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?logout=1';?>'"><img src="images/logout_ico.png">Logout</a></div>
    </div>    
    <nav class="header_menu" id="sidebarnav">
        <ul>
            <li><a href="home.php">Projects</a></li>
            <li><a href="clients.php">Clients</a></li>
        </ul>
    </nav>
    <div class="header_shadow"></div>
</header>