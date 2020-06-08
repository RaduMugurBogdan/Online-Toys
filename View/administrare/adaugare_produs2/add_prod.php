<?php
if(isset($_SESSION)==false){
    session_start();
}
include './Model/database_model.php';
include './Model/products_model.php';
$aux_object=new ProductsModel();
?>
<!DOCTYPE html>
<html lang="ro">
    <head>
        <title>Add Products</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../View/administrare/adaugare_produs2/add_prod.css">
        <link rel="stylesheet" href="../View/administrare/admin_brand_category/admin_bc.css">
    </head>
    <body onload="first_load()">
        <form id="main_container"  enctype="multipart/form-data" method="POST" action="../Model/products_model.php"> 
            <section id="title_panel">
                Inserati produs
            </section>
            <section id="fields_container">
                <section class="inputs_panel">
                    <span class="input_label">Nume produs</span> 
                    <input type="text" class="input_field" id="product_name_id" name="product_name" onchange="change_product_name(this)">   
                    <div class="error_warn">
                        <?php
                            if(isset($_SESSION['product_name_error'])){
                                echo $_SESSION['product_name_error'];
                            }
                        ?>
                    </div>            
                </section>
                <section class="inputs_panel">
                    <span class="input_label"><span>Brand produs</span><span class="plus_button">+</span></span> 
                    <select class="input_field scr_field" id="brands_container" name="product_brand" onchange="change_function(this)">
                        <?php
                            echo "<option>Choose</option>";
                            $brands=$aux_object->get_brands();
                            for($i=0;$i<count($brands);$i++){
                                echo "<option>".$brands[$i]['NUME_BRAND']."</option>";    
                            }
                        ?>  
                    </select>
                    <div class="error_warn">
                    </div>              
                </section>
                
                <section class="inputs_panel">
                    <span class="input_label"><span>Categorie produs</span><span class="plus_button">+</span></span> 
                    <select class="input_field scr_field" id="categories_container" name="product_category" onchange="change_function(this)">
                        <?php
                            
                            echo "<option>Choose</option>";
                            $categories=$aux_object->get_categories();
                            for($i=0;$i<count($categories);$i++){
                                echo "<option>".$categories[$i]['NUME_CATEGORIE']."</option>";    
                            }
                        ?>
                    </select>
                    <div class="error_warn">
                    </div>                
                </section>
                
                <section class="inputs_panel">
                    <span class="input_label">Material produs</span> 
                    <select class="input_field scr_field" name="product_material" onchange="change_function(this)">
                            <?php
                               echo "<option>Choose</option>";
                               $mat=$aux_object->get_material_classes();
                               for($i=0;$i<count($mat);$i++){
                                   echo "<option>".$mat[$i]."</option>";    
                                }
                            ?>
                    </select>
                    <div class="error_warn">

                    </div>               
                </section>
                
                <section class="inputs_panel">
                    <span class="input_label">Mode de functionare</span> 
                    <select class="input_field scr_field" name="op_mode" onchange="change_function(this)">
                            <?php
                               echo "<option>Choose</option>";
                               $mat=$aux_object->get_op_mode();
                               for($i=0;$i<count($mat);$i++){
                                   echo "<option>".$mat[$i]."</option>";    
                                }
                            ?>
                    </select>
                    <div class="error_warn">

                    </div>               
                </section>
                
                <section class="inputs_panel">
                    <span class="input_label">Clasa de varsta</span> 
                    <select class="input_field scr_field" name="age_class" onchange="change_function(this)">
                             <?php
                               echo "<option>Choose</option>";
                               $mat=$aux_object->get_age_classes();
                               for($i=0;$i<count($mat);$i++){
                                   echo "<option>".$mat[$i]."</option>";    
                                }
                            ?>
                    </select>               
                    <div class="error_warn">

                    </div>
                </section>
                
                <section class="inputs_panel">
                    <span class="input_label">Destinatar produs</span> 
                    <select class="input_field scr_field" name="product_receiver" onchange="change_function(this)">
                            <?php
                               echo "<option>Choose</option>";
                               $mat=$aux_object->get_receiver_classes();
                               for($i=0;$i<count($mat);$i++){
                                   echo "<option>".$mat[$i]."</option>";    
                                }
                            ?>
                    </select>
                    <div class="error_warn">

                    </div>               
                </section>
                <section class="inputs_panel">
                    <span class="input_label">Pret produs</span> 
                    <input class="input_field" type="number" name="product_price" id="product_price_id" onchange="change_product_name(this)">
                            
                    <div class="error_warn">
                    </div>               
                </section>
                <section class="inputs_panel">
                    <span class="input_label">Fotografii produs</span> 
                    <input type="file"  class="input_field" multiple id="pictures_container" name="product_pictures[]" onchange="change_pictures(this)">
                    <div class="error_warn">
                    </div>               
                </section>
            </section>
            <section id="form_buttons_cont">
                <button type="button" class="form_button" onclick="valid_formular()">Submit</button> 
                <button type="button" class="form_button">Reset</button>             
            </section>
        </form>    
        <!------------------------------------------------>
        <section id="main_panel">
            <form class="options_container" method="POST" action="../Model/products_model.php" id="new_brand_form">
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
            

            <form class="options_container" method="post" action="../Model/products_model.php">
                <section class="section_title_label">Sterge Brand</section>
                <section class="controllers_panel"> 
                    <span class="option_name_label">Selectati brand</span>
                    <select class="input_field" name="delete_brand" id="brand_field" onchange="change_brand()">
                    </select>                 
                    <input type="submit" class="valid_button" id="delete_brand_button" value="Aplica" disabled>
                </section>
            </form>
            
            <form class="options_container" method="post" action="../Model/products_model.php" id="new_category_form">
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
            
            <form class="options_container" method="post" action="../Model/products_model.php">
                <section class="section_title_label">Sterge Categorie</section>
                <section class="controllers_panel"> 
                    <span class="option_name_label">Selectati categorie</span>
                    <select class="input_field"  name="delete_category" id="category_field" onchange="change_category()">
                    </select> 
                    <input type="submit" class="valid_button" id="delete_category_button" value="Aplica" disabled>
                </section>   
            </form>

        </section>
        
        <script src="../View/administrare/adaugare_produs2/add_prod.js"></script>
        <script src="../View/administrare/adaugare_produs2/admin_bc.js"></script>
    </body>
</html>