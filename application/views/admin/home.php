<nav id="myNavbar" class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ADMINISTRATION</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="adminhome">Home</a></li>
                    <li><a href="profile">Profile</a></li>
                    <li><a href="editorial">Editorials</a></li>
                    <li><a href="campaign">Campaigns</a></li>
                    <li><a href="test">Tests</a></li>
                    <li><a href="autre">Autres</a></li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $username; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="manageadmin">Manage admin</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li class="divider"></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"> QUICK ADD <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">ADD PHOTOGRAPHER </button></li>
                            <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">ADD EDITORIAL</button></li>
                            <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal3">ADD CAMPAIGN</button></li>
                            <li><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal4">ADD IMG</button></li>
                            <li class="divider"></li>
                            
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
