<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<html>
    <head>
        <title>Create Account</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <link rel="stylesheet" href="./View/administrare/utilizatori/utilizatori_style.css">
        <link rel="stylesheet" href="./View/administrare/components/search_mini_view/mini_view_style.css">
    </head>
    <body  onload="general_onload_function()">
        
        <?php include './View/administrare/components/meniu.php'; ?>
        
        <div id="lng-content">
        <section id="filter_panel">
            <form id="main_container" method="POST" action="../../../Model/account_model.php?action=get_user_data">
                <div id="title_container">    
                    <span id="title_label">Cauta client</span>
                </div>
                    <div class="input_data_panel">
                    <div class="input_label">E-mail Address</div>
                    <input type="text" class="input_box" id="input_email" name="email" value="<?php if(isset($_SESSION['users_filter_email'])){echo $_SESSION['users_filter_email'];} ?>">
                </div>
                <div class="error_warn" id="email_error"> 
                </div>
                <div class="input_data_panel">
                    <div class="input_label">First Name</div>
                    <input type="text" class="input_box" id="input_first_name" name="first_name" value="<?php if(isset($_SESSION['users_filter_first_name'])){echo $_SESSION['users_filter_first_name'];} ?>">
                </div>
                <div class="error_warn" id="first_name_error"> 
                </div>
            
                <div class="input_data_panel">
                    <div class="input_label">Last Name</div>
                    <input type="text" class="input_box" id='input_last_name' name="last_name" value="<?php if(isset($_SESSION['users_filter_last_name'])){echo $_SESSION['users_filter_last_name'];} ?>">
                </div>
                <div class="error_warn" id="last_name_error"> 
                </div>

            
                
                <div class="input_data_panel">
                    <div class="input_label">Phone Number</div>
                    <input type="tel" class="input_box" id="input_phone" name="phone" value="<?php if(isset($_SESSION['users_filter_phone'])){echo $_SESSION['users_filter_phone'];} ?>">
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
                <div class="error_warn" id="county_error"> 
                </div>
            

                <hr class="sep_hr">
                <div id="buttons_panel">
                    <input type="button" value="Cauta" class="user_button" onclick="perform_request()">
                    <input type="button" value="Reseteaza" class="user_button" onclick="reset_fields()">    
                </div>
            </form>
            <section id="results_container">
                <div id="title_container">    
                <span id="title_label">Rezultate</span>
                </div>
                <?php
                    include './View/administrare/components/search_mini_view/mini_view.php';
                ?>
                <section id="page_buttons_panel">
                        <button class="page_buttons"><i class="fa fa-arrow-circle-left" ></i></button>
                        <span id="page_label">Page <span id="curent_page_number"></span>/<sub id="pages_number"></sub> </span>
                        <button class="page_buttons"><i class="fa fa-arrow-circle-right"></i></button>
                </section>
            </section>
        </section>
        <section id="sep_container"  onclick="close_window()">
            <section id="details_panel">
                <div id="exit_button_container" onclick="close_window()">X</div>
                <section id="details_title_label"></section>
                <section id="details_content">
                    
                </section>
            </section>
        </section>
        </div>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src='./utilizatori_script.js'></script>
    </body>
</html>
