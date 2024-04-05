<nav class="navbar mynavbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#">BloodBank Management System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav mr-auto"  ></ul>
                    <form class="form-inline my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto"  >
                            
                            <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'userdashboard.php' ? 'active' : ''; ?>">
                            <a class="nav-link" href="userdashboard.php">Home</a>
                            </li>
                            
                            
                            <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'joinus.php' ? 'active' : ''; ?>">
                            <a class="nav-link" href="joinus.php">Join Us</a>
                            </li>
                    
                            <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'userstock.php' ? 'active' : ''; ?>">
                                <a class="nav-link" href="userstock.php">Make Request</a>
                            </li>
                            
                            <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'logout.php' ? 'active' : ''; ?>">
                            <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        
                        </ul>
                    </form>
                </div>
            </nav>