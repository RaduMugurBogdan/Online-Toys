<?php
    if(isset($_SESSION)==false){
        session_start();
    }
?>

<html> 
    <head>
        <title>Login Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="./View/client_side/login_page/login_page_style.css">
        
    </head>
    <body>        
        <form id="main_container" method="post" action="./Model/account_model.php?action=login">
            <div id="title_container">
                <i class='fas fa-user-circle' id="title_picture"></i>
                <span id="title_label">Login</span>
            </div>
            <div class="input_data_panel">
                <div class="input_label">E-mail</div>
                <input type="text" id="email_box" class="input_box" name="email" value="<?php if(isset($_SESSION['email_value'])){echo $_SESSION['email_value'];}?>">
            </div>
            <div class="error_message_box" id="email_warn">
                <?php
                    if(isset($_SESSION['email_error'])){
                        echo $_SESSION['email_error'];
                    }
                ?>
            </div>
            <div class="input_data_panel">
                <div class="input_label">Password</div>
                <input type="password" id="password_box" class="input_box" name="password">
            </div>
            <div class="error_message_box" id="password_warn">
                <?php
                    if(isset($_SESSION['pass_error'])){
                        echo $_SESSION['pass_error'];
                    }
                ?>
            </div>
            <hr class="sep_hr">
            <div id="buttons_panel">
                <input type="button" value="Log in" class="user_button"  onclick="validate_login()">
                <a href="http://localhost/ProiectTW/Online-Toys/create_account">
                <input type="button" value="Create Account" class="user_button">    
                </a>
            </div>
        </form>

        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="./View/client_side/login_page/login_page_script.js"></script>
    </body>
</html>