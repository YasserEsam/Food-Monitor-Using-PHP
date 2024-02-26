<?php 
require_once("validate_session.php");

if($_SESSION['user_type'] == "admin"){
    
    echo "
    
<div id='layoutSidenav'>
<div id='layoutSidenav_nav'>
    <nav class='sb-sidenav accordion sb-sidenav-dark' id='sidenavAccordion'>
        <div class='sb-sidenav-menu'>
            <div class='nav'>
                <div class='sb-sidenav-menu-heading'>Dashboard</div>
                <a class='nav-link' href='index.php'>
                    <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                    Complaintes
                </a>
                <a class='nav-link' href='providers.php'>
                    <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                    Providers
                </a>
                <a class='nav-link' href='rules.php'>
                    <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                    Rules
                </a>
                <a class='nav-link' href='users.php'>
                    <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                    Users
                </a>
                <a class='nav-link' href='evaluate.php'>
                    <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                    Evaluate
                </a>
                <a class='nav-link' href='reports.php'>
                    <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                    Reports
                </a>
            </div>
        </div>
    </nav>
</div>
    ";
}else{
    echo"
    
    
<div id='layoutSidenav'>
<div id='layoutSidenav_nav'>
    <nav class='sb-sidenav accordion sb-sidenav-dark' id='sidenavAccordion'>
        <div class='sb-sidenav-menu'>
            <div class='nav'>
                <div class='sb-sidenav-menu-heading'>Dashboard</div>
                <a class='nav-link' href='index.php'>
                    <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                    Complaintes
                </a>
                <a class='nav-link' href='evaluate.php'>
                    <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                    Evaluate
                </a>
                <a class='nav-link' href='reports.php'>
                    <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                    Reports
                </a>
            </div>
        </div>
    </nav>
</div>
    
    ";
}

?>
