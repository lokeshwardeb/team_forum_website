 <!-- navbar section starts here -->
 <div class="container">
            <nav id="" class="navbar navbar-expand-lg  p-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <div id="" class="d-flex logo-section fs-4">
                            <div class="logo_part_1 fw-bold cus-primary-color">D</div>
                            <div class="logo_part_2">ahuk</div>
                        </div>

                        <!-- <img src="/assets/img/dahuk_new_logo.jpg" alt=""> -->


                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- id="navchilddiv2" -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul id="ulist" class="nav m-auto nav-sections">
                            <li class=""><a href="/home"
                                    class="nav-link text-dark ms-2 cus-nav-link-hover  <?php echo $controllers->active_class($active_class_nav_home) ?> ">Home</a> </li>
                            <li class=""><a href="/publisher_home" class="nav-link text-dark ms-2 cus-nav-link-hover  ">Dashboard</a>
                            </li>
                            <li class=""><a href="/all_blogs" class="nav-link text-dark ms-2 cus-nav-link-hover <?php echo $controllers->active_class($active_class_nav_blogs) ?>  ">Blogs</a> </li>
                            <li class=""><a href="" class="nav-link text-dark ms-2 cus-nav-link-hover  ">About</a> </li>
                            <li class="mb-2"><a href="" class="nav-link text-dark ms-2 cus-nav-link-hover  <?php echo $controllers->active_class($active_class_nav_contact) ?> ">Contact
                                    Us</a>
                            </li>

                            <li><a href="/login"><button id="button1" class="ms-4 nav_login_btn btn cus-bg-primary-color text-light">Log
                                    in</button></a></li>
                        </ul>
                    </div>
            </nav>
        </div>
        <!-- navbar section ends here -->

