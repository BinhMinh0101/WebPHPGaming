<?php
    session_start();
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span>Gear</span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg><?php echo $_SESSION['Holot'].' '.$_SESSION['Ten'].' '?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="../../View/index.php"><svg class="glyph stroked home">
                                    <use xlink:href="#stroked-home"/></use>
                                </svg>Trang chính</a></li>
                        <li><a href="../../View/login-register/logout.php"><svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</nav>