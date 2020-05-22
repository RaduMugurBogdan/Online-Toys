<html>
    <head>
        <title>Create Account</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <link rel="stylesheet" href="./View/client_side/create_acc_page/create_acc_style.css">
    </head>
    <body  onload="get_counties(this)">
        <form id="main_container" method="POST" action="./Model/account_model.php?action=create_account">
            <div id="title_container">    
                <i class='fas fa-user-alt' id="title_picture"></i>
                <span id="title_label">Create Account</span>
            </div>
              

            <div class="input_data_panel">
                <div class="input_label">E-mail Address</div>
                <input type="text" class="input_box" id="input_email" name="email" value="<?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];} ?>">
            </div>
            <div class="error_warn" id="email_error"> 
                <?php
                    if(isset($_SESSION['email_error'])){
                        echo $_SESSION['email_error'];
                    }
                ?>
            </div>


            <div class="input_data_panel">
                <div class="input_label">Password</div>
                <input type="password" class="input_box" id="input_pass" name="password" value="<?php if(isset($_SESSION['user_password'])){echo $_SESSION['user_password'];} ?>">
            </div>
            
            <div class="error_warn" id="pass_error">
            </div>

            <div class="input_data_panel">
                <div class="input_label">Confirm Password</div>
                <input type="password" class="input_box" id='input_conf_pass' name="conf_password" value="<?php if(isset($_SESSION['user_conf_password'])){echo $_SESSION['user_conf_password'];} ?>">
            </div> 
            
            <div class="error_warn" id="conf_pass_error">
            </div>


            <div class="input_data_panel">
                <div class="input_label">First Name</div>
                <input type="text" class="input_box" id="input_first_name" name="first_name" value="<?php if(isset($_SESSION['user_first_name'])){echo $_SESSION['user_first_name'];} ?>">
            </div>

            <div class="error_warn" id="first_name_error">
            </div>
            
            <div class="input_data_panel">
                <div class="input_label">Last Name</div>
                <input type="text" class="input_box" id='input_last_name' name="last_name" value="<?php if(isset($_SESSION['user_last_name'])){echo $_SESSION['user_last_name'];} ?>">
            </div>

            <div class="error_warn" id="last_name_error">
            </div>
            
            <div class="input_data_panel">
                <div class="input_label">Phone Number</div>
                <input type="text" class="input_box" id="input_phone" name="phone" <?php if(isset($_SESSION['user_phone'])){echo $_SESSION['user_phone'];} ?>>
            </div>
            
            <div class="error_warn" id="phone_error">
            </div>

            <div class="input_data_panel">
                <div class="input_label">County</div>
                <select class="input_box" id="input_county" name="county" onchange="change_county(this)">
                </select>
            </div>
                    
            <div class="error_warn" id="county_error">
            </div>

            <div class="input_data_panel">
                <div class="input_label">Town</div>
                <select class="input_box" id="input_town" name="town">
                </select>
            </div>
            
            <div class="error_warn" id="town_error">
            </div>

            <div class="input_data_panel">
                <div class="input_label">Details</div>
                <textarea class="input_text_area" name="details"></textarea>
            </div>

            <hr class="sep_hr">
            <div id="buttons_panel">
                <input type="button" value="Create Account" class="user_button" onclick="perform_request()">    
            </div>
        </form>

        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src='./View/client_side/create_acc_page/create_account_page.js'></script>
    </body>
</html>