<?php
if(!isset($_SESSION)){
    session_start();
}
include './Model/account_model.php';
?>
<html>
    <head>
        <style>
            <?php
                if(isset($_GET['target'])){
                    
                    if($_GET['target']=="favorite"){
                        echo "#favorite_id{color:red;}";
                    }
                    if($_GET['target']=="chart"){
                        echo "#postari_id{color:red;}";
                    }
                }

            ?>
        </style>


        <meta name="viewport" content="width=device-width, initial-scale=1.0" http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <link rel="stylesheet" href="./View/client_side/account_config/personal_posts_page_style.css">
        <link rel="stylesheet" href="./View/client_side/Components/mini_personal_view/mini_personal_view.css">
        <?php
            include "./View/client_side/Components/imports/header_footer_imports.php";
        ?>
    </head>
    <body> 
    <?php
            //import the header code
            include './View/client_side/Components/header/header.php';
    ?>

     <section id="main_container">   
        <section id="main_details_container">
            <section id="username_container">
                <img  id="user_picture" src="https://cdn0.iconfinder.com/data/icons/set-ui-app-android/32/8-512.png">
                <span id="username_label"><?php if(isset($_SESSION['log_user_first_name'])){echo $_SESSION['log_user_first_name']." ".$_SESSION['log_user_last_name'];}?></span>
            </section>
            <hr class="contact_del_line">
            <section id="contact_data_container">
                <div class="section_label">Contact</div>
                <div class="contact_item"><div class="contact_label">Telefon</div><div class="contact_value"><?php if(isset($_SESSION['log_phone'])){echo $_SESSION['log_phone'];}?></div></div>
                <div class="contact_item"><div class="contact_label">E-main</div><div class="contact_value"><?php if(isset($_SESSION['log_email'])){echo $_SESSION['log_email'];}?></div></div>
                <div class="section_label">Adresa</div>
                <div class="contact_item"><div class="contact_label">Judet</div><div class="contact_value"><?php if(isset($_SESSION['log_county'])){echo $_SESSION['log_county'];}?></div></div>
                <div class="contact_item"><div class="contact_label">Localitate</div><div class="contact_value"><?php if(isset($_SESSION['log_town'])){echo $_SESSION['log_town'];}?></div></div>
                
            </section>
            <button class="logg_out_button">
                <a href="./Model/account_model.php?action=perform_log_out">
                    Log Out
                </a>
            </button>
            
        </section>
        <section id="posts_container">
            <section id="posts_title_container">
                <span class="posts_label" ><a id="postari_id" href="http://localhost/ProiectTW/Online-Toys/account_config?target=chart">Cos</a></span>
                <span class="posts_label" ><a id="favorite_id" href="http://localhost/ProiectTW/Online-Toys/account_config?target=favorite">Favorite</a></span>
            </section>
            <hr class="contact_del_line">
            
            <section class="user_content" id="cont_container">          
                <?php
                    $acc=new AccountModel();
                    if(isset($_GET['target']) && $_GET['target']=="favorite"){
                        $results=$acc->get_client_favorites();
                        for($i=0;$i<count($results);$i++){
                ?>
                    <section class="main_posts_container">
                            <section class="post_container">
                            <a href="http://localhost/ProiectTW/Online-Toys/product_page?product_id=<?php echo $results[$i]['id_produs'];?>">    
                            <section class="mini_view_info">
                                    <section class="mini_view_picture">
                                    <img class="picture" src="data:image/jpeg;base64,<?php echo base64_encode($results[$i]['poza']);?>" />
                                    
                                    </section>
                                        <section class="mini_view_labels">   
                                            <span class="brand_name_container"><?php echo $results[$i]['brand_name'];?></span>
                                            <span class="model_name_container"><?php echo $results[$i]['nume_produs']; ?></span> 
                                        </section>
                                        
                                </section>
                                </a>
                                <section class="options_panel">
                                    <section class="post_option" onclick="delete_favorite(<?php echo 'this,'.$_SESSION['log_id'];?>,<?php echo  $results[$i]['id'];?>)">Sterge</section>
                                </section>
                            </section>
                    </section>


                <?php
                        }
                    }else if(isset($_GET['target']) && $_GET['target']=="chart"){
                        $results=$acc->get_client_chart();
                        for($i=0;$i<count($results);$i++){
                        ?>

                            <form class="main_posts_container">
                                <section class="post_container">
                                <a href="http://localhost/ProiectTW/Online-Toys/product_page?product_id=<?php echo $results[$i]['id_produs'];?>">    
                                <section class="mini_view_info">
                                        <section class="mini_view_picture">
                                        <img class="picture" src="data:image/jpeg;base64,<?php echo base64_encode($results[$i]['poza']);?>" />
                                        
                                        </section>
                                            <section class="mini_view_labels">   
                                                <span class="brand_name_container">Brand: <?php echo $results[$i]['brand_name'];?></span>
                                                <span class="model_name_container">Nume: <?php echo $results[$i]['nume_produs'];?></span>
                                                <span class="model_name_container">Pret: <?php echo $results[$i]['pret_produs'];?> roni</span> 
                                            </section>
                                            
                                    </section>
                                </a>
                                    <section class="options_panel">
                                        <section class="post_option" >Numar produse:<input type="number" class="items_number_field" min="0" max="<?php echo $results[$i]['stoc'];?>" value=1></section>
                                        <section class="post_option" onclick="delete_chart_item(<?php echo 'this,'.$_SESSION['log_id'];?>,<?php echo  $results[$i]['id'];?>)">Sterge</section>
                                    </section>
                                </section>
                            </form>
                        <?php
                        }
                        ?>
                        
                        <button class="logg_out_button">
                            Efectuare Comanda
                        </button>
                        <?php
                }   
                ?>
           </section>
       </section>
    </section>
    <?php
        include './View/client_side/Components/footer/footer.php';
    ?> 
    <script type="text/javascript" src="./View/client_side/main_frame/main_frame_script.js"></script>
    <script type="text/javascript" src="./View/client_side/account_config/personal_posts.js"></script>
   
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </body>
</html>