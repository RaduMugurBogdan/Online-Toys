<?php
    if(isset($_SESSION)==false){
        session_start();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./View/administrare/admin_brand_category/admin_bc.css">
    </head>
    <body onload="first_load()">
        <section id="main_panel">
            <form class="options_container" method="POST" action="./Model/products_model.php" id="new_brand_form">
                <section class="section_title_label">Adauga Brand</section>
                <section class="controllers_panel">
                    <span class="option_name_label">Nume brand</span>
                    <input type="text" class="input_field"  name="insert_brand" id="insert_brand_field">                 
                    <input type="button" class="valid_button" value="Aplica" onclick="valid_brand_name()">
                </section>              
                <section class="error_field" id="brand_field_error">
                    <?php
                        if(isset($_SESSION['new_brand_error'])){
                            echo $_SESSION['new_brand_error'];
                        }
                    ?>
                </section>
            </form>
            

            <form class="options_container" method="post" action="./Model/products_model.php">
                <section class="section_title_label">Sterge Brand</section>
                <section class="controllers_panel"> 
                    <span class="option_name_label">Selectati brand</span>
                    <select class="input_field" name="delete_brand" id="brand_field" onchange="change_brand()">
                    </select>                 
                    <input type="submit" class="valid_button" id="delete_brand_button" value="Aplica" disabled>
                </section>
            </form>
            
            <form class="options_container" method="post" action="./Model/products_model.php" id="new_category_form">
                <section class="section_title_label">Adauga Categorie</section>
                <section class="controllers_panel">
                    <span class="option_name_label">Nume categorie</span>
                    <input type="text" class="input_field" name="insert_category" id="insert_category_field">
                    <input type="button" class="valid_button" value="Aplica" onclick="valid_category_name()">
                </section>   
                <section class="error_field" id="category_field_error">
                    <?php
                        if(isset($_SESSION['new_category_error'])){
                            echo $_SESSION['new_category_error'];
                        }
                    ?>
                </section>    
            </form>
            
            <form class="options_container" method="post" action="./Model/products_model.php">
                <section class="section_title_label">Sterge Categorie</section>
                <section class="controllers_panel"> 
                    <span class="option_name_label">Selectati categorie</span>
                    <select class="input_field"  name="delete_category" id="category_field" onchange="change_category()">
                    </select> 
                    <input type="submit" class="valid_button" id="delete_category_button" value="Aplica" disabled>
                </section>   
            </form>

        </section>
    
        <script src="./View/administrare/admin_brand_category/admin_bc.js"></script>
    </body>
</html>