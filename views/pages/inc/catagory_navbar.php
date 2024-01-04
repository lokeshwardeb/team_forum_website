<div class="container">
    <?php

    if(isset($_GET['catagory_sl_no'])){
        $get_catgory_id_nav = $controllers->pure_data($_GET['catagory_sl_no']);

    }



    ?>
    <ul class="mt-4 mb-4 pt-4 pb-4">

    <li class="navbar m-2 bg-white cata-li <?php

if ($get_catgory_id_nav == '' || !isset($_GET['catagory_sl_no'])) {
    echo 'link-actived';
}

?>"><a href="?catagory_sl_no" class="nav-link m-auto p-4">ALL</a></li>

    <?php

    $results_catagory = $controllers->show_all("catagory");

    if($results_catagory){
        if($results_catagory->num_rows > 0){
            while($row = $results_catagory->fetch_assoc()){
                echo '
                <li class="navbar m-2 bg-white cata-li '?><?php

                if ($get_catgory_id_nav == $row['catagory_id']) {
                    echo 'link-actived';
                }
                
                ?><?php
                echo '

                ?>"><a href="?catagory_sl_no='. $row['catagory_id'] .'" class="nav-link m-auto p-4">'. $row['catagory_name'] .'</a></li>
                
                ';
            }
        }else{
            echo '
            
            <li class="navbar m-2 bg-white cata-li '?><?php

                                                if ($get_catgory_id_nav == '' || !isset($_GET['catagory_sl_no'])) {
                                                    echo 'link-actived';
                                                }

                                                ?><?php

                                                echo '
                                                
                                                "><a href="?catagory_sl_no" class="nav-link m-auto p-4">ALL</a></li>
        <li class="navbar m-2 bg-white cata-li '?><?php

                                                if ($get_catgory_id_nav == '1') {
                                                    echo 'link-actived';
                                                }

                                                ?><?php

                                                echo '
                                                
                                                "><a href="?catagory_sl_no=1" class="nav-link m-auto p-4">UI/UX DESIGN</a></li>
        <li class="navbar m-2 bg-white cata-li '?><?php

                                                if ($get_catgory_id_nav == '2') {
                                                    echo 'link-actived';
                                                }

                                                ?><?php
                                                
                                                echo '


                                                "><a href="?catagory_sl_no=2" class="nav-link m-auto p-4">SOFTWARE ENGINEERING</a></li>
        <li class="navbar m-2 bg-white cata-li '?><?php

                                                if ($get_catgory_id_nav == '3') {
                                                    echo 'link-actived';
                                                }

                                                ?><?php 
                                                echo '
                                                "><a href="?catagory_sl_no=3" class="nav-link m-auto p-4">FRONTEND DEVELOPER</a></li>
        <li class="navbar m-2 bg-white cata-li '?><?php

                                                if ($get_catgory_id_nav == '4') {
                                                    echo 'link-actived';
                                                }

                                                ?><?php
                                                echo '
                                                "><a href="?catagory_sl_no=4" class="nav-link m-auto p-4">BACKEND DEVELOPER</a></li>
        <li class="navbar m-2 bg-white cata-li '?><?php

                                                if ($get_catgory_id_nav == '5') {
                                                    echo 'link-actived';
                                                }

                                                ?><?php
                                                echo '
                                                "><a href="?catagory_sl_no=5" class="nav-link m-auto p-4">FULL STACK DEVELOPER</a></li>
            
            ';
        }
    }


    ?>


        
    </ul>
</div>