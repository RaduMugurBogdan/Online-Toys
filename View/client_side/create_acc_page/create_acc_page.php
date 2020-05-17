<html>
    <head>
        <title>Create Account</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="./View/client_side/create_acc_page/create_acc_style.css">
    </head>
    <body>
        <form id="main_container" method="POST" action="./Model/account_model.php?action=create_account">
            <div id="title_container">    
                <i class='fas fa-user-alt' id="title_picture"></i>
                <span id="title_label">Create Account</span>
            </div>
              

            <div class="input_data_panel">
                <div class="input_label">E-mail Address</div>
                <input type="text" class="input_box" id="input_email" name="email">
            </div>
            <div class="error_warn" id="email_error"> 
            </div>


            <div class="input_data_panel">
                <div class="input_label">Password</div>
                <input type="password" class="input_box" id="input_pass" name="password">
            </div>
            
            <div class="error_warn" id="pass_error">
            </div>

            <div class="input_data_panel">
                <div class="input_label">Confirm Password</div>
                <input type="password" class="input_box" id='input_conf_pass' name="conf_password">
            </div> 
            
            <div class="error_warn" id="conf_pass_error">
            </div>


            <div class="input_data_panel">
                <div class="input_label">First Name</div>
                <input type="text" class="input_box" id="input_first_name" name="first_name">
            </div>

            <div class="error_warn" id="first_name_error">
            </div>
            
            <div class="input_data_panel">
                <div class="input_label">Last Name</div>
                <input type="text" class="input_box" id='input_last_name' name="last_name">
            </div>

            <div class="error_warn" id="last_name_error">
            </div>
            
            <div class="input_data_panel">
                <div class="input_label">Phone Number</div>
                <input type="text" class="input_box" id="input_phone" name="phone">
            </div>
            
            <div class="error_warn" id="phone_error">
            </div>

            <div class="input_data_panel">
                <div class="input_label">County</div>
                <select class="input_box" id="input_county" name="county">
                    <option  selected>Choose</option>  
                    <option>Iasi</option>
                    <option>Galati</option>
                    <option>Botosani</option>
                    <option>Constanta</option>
                    <option>Tulcea</option>
                </select>
            </div>
            
            <div class="error_warn" id="county_error">
            </div>

            <div class="input_data_panel">
                <div class="input_label">Town</div>
                <input type="text" class="input_box" id="input_town" name="town">
            </div>
            
            <div class="error_warn" id="town_error">
            </div>

            <div class="input_data_panel">
                <div class="input_label">Postal Code</div>
                <input type="text" class="input_box" id="input_postal_code" name="postal_code">
            </div>
            
            <div class="error_warn" id="postal_code_error">
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