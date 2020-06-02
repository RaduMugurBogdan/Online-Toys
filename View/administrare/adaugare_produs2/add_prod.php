<?php
if(isset($_SESSION)==false){
    session_start();
}
include './Model/database_model.php';
include './Model/products_model.php';
$aux_object=new ProductsModel();
?>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./View/administrare/adaugare_produs2/add_prod.css">
    </head>
    <body>
        <form id="main_container"  enctype="multipart/form-data" method="POST" action="./Model/products_model.php"> 
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
                                echo "<option>".$brands[$i]['nume_brand']."</option>";    
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
                                echo "<option>".$categories[$i]['categorie']."</option>";    
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
        
        
        <script src="./View/administrare/adaugare_produs2/add_prod.js"></script>
    </body>
</html>