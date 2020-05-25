<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <link rel="stylesheet" href="./View/client_side/account_config/personal_posts_page_style.css">
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
            <button id="logg_out_button">
                
                <a href="./Model/account_model.php?action=perform_log_out">
                    Log Out
                </a>
            </button>
            
        </section>
        <section id="posts_container">
            <section id="posts_title_container">
                <span class="posts_label" ><a id="postari_id" href="./personal_posts_page.php?page=postari_id">Cos</a></span>
                <span class="posts_label" ><a id="favorite_id" href="./personal_posts_page.php?page=favorite_id">Favorite</a></span>
                <span class="posts_label" ><a id="cont_id" href="./personal_posts_page.php?page=cont_id">Cont</a></span>
            </section>
            <hr class="contact_del_line">
            
            <section class="user_content" id="cont_container">
                
           </section>
       </section>
    </section>
    <?php
        include './View/client_side/Components/footer/footer.php';
    ?> 
    <script type="text/javascript" src="./View/client_side/main_frame/main_frame_script.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </body>
</html>