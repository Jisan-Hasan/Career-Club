<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="admin_home.php">CareerClub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <!--Dashboard-->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dashboard
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="admin_userlist.php">User</a>
                    <a class="dropdown-item" href="admin_employerlist.php">Employer</a>

                    <!--Package dashboard-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Post Package
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="add_package.php">Add Package</a>
                    <a class="dropdown-item" href="view_package.php">View Package</a>
                    <!--Categories-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="add_categories.php">Add Categories</a>
                    <a class="dropdown-item" href="view_categories.php">View Categories</a>

                    <!--paymentview-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Payment View
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="admin_paymentview.php">Transaction View</a>
                    <a class="dropdown-item" href="admin_employerpayment.php">Employers Payment</a>

                    <!--jobview-->
            <li class="nav-item">
                <a class="nav-link" href="admin_jobview.php">Job View</a>
            </li>


            <li class="nav-item active">

                <a class="nav-link" href="admin_logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>