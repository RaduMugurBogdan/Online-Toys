
<form id="nav_details_container" action="./Model/filter_model.php" method="POST"> 
                    <?php
                        require_once './Model/database_model.php';
                        require_once './Model/products_model.php';

                        $pfm=new ProductsModel();
                    ?>


                    <section class="filter_label_container">
                        <div class="filter_label" onclick="close_filter()"> <i class="fa fa-close" style="font-size:36px" id="close_filter_button"></i>
                        </div>
                    </section>
                    <section class="filter_label_container">
                        <div class="filter_label">Filtre</div>
                    </section>
                    <section class="product_filter_category">
                        <div class="category_title">Producator</div>
                        <select class="category_body" name="brand" onchange="">
                            <option>Alege</option>
                            <?php
                                $brands=$pfm->get_brands();
                                for($i=0;$i<count($brands);$i++){
                                    if(isset($_SESSION['product_brand']) && $_SESSION['product_brand']===$brands[$i]['NUME_BRAND']){
                                        echo "<option selected>".$brands[$i]['NUME_BRAND']."</option>";    
                                    }else{
                                        echo "<option>".$brands[$i]['NUME_BRAND']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </section>
                    <section class="product_filter_category">
                        <div class="category_title">Categorie</div>
                        <select class="category_body" name="category">
                            <option>Alege</option>
                            <?php
                                $categories=$pfm->get_categories();
                                for($i=0;$i<count($categories);$i++){
                                    if(isset($_SESSION['product_category']) && $_SESSION['product_category']===$categories[$i]['NUME_CATEGORIE']){
                                        echo "<option selected>".$categories[$i]['NUME_CATEGORIE']."</option>";    
                                    }else{
                                        echo "<option>".$categories[$i]['NUME_CATEGORIE']."</option>";
                                    }
                                }
                            ?>
                        </select>
                        </select>
                    </section>
                    <section class="product_filter_category">
                        <div class="category_title">Material</div>
                        <select class="category_body" name="material">
                        <option>Alege</option>
                            <?php
                                $materials=$pfm->get_material_classes();
                                for($i=0;$i<count($materials);$i++){
                                    if(isset($_SESSION['product_material']) && $_SESSION['product_material']===$materials[$i]){
                                        echo "<option selected>".$materials[$i]."</option>";    
                                    }else{
                                        echo "<option>".$materials[$i]."</option>";
                                    }
                                }
                            ?>
                        </select>
                        </select>
                    </section>
                    
                    <section class="product_filter_category">
                        <div class="category_title">Mod de functionare</div>
                        <select class="category_body" name="op_mode">
                            <option>Alege</option>
                            <?php
                                $op_modes=$pfm->get_op_mode();
                                for($i=0;$i<count($op_modes);$i++){
                                    if(isset($_SESSION['product_op_mode']) && $_SESSION['product_op_mode']===$op_modes[$i]){
                                        echo "<option selected>".$op_modes[$i]."</option>";    
                                    }else{
                                        echo "<option>".$op_modes[$i]."</option>";
                                    }
                                }
                            ?>                        
                        </select>
                    </section>
                    <section class="product_filter_category">
                        <div class="category_title">Varsta</div>
                        <select class="category_body" name="age_class">
                            <option>Alege</option>
                            <?php
                                $age_classes=$pfm->get_age_classes();
                                for($i=0;$i<count($age_classes);$i++){
                                    if(isset($_SESSION['product_age_class']) && $_SESSION['product_age_class']===$age_classes[$i]){
                                        echo "<option selected>".$age_classes[$i]."</option>";    
                                    }else{
                                        echo "<option>".$age_classes[$i]."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </section>
                
                <section class="product_filter_category">
                    <div class="category_title">Destinatari</div>
                    <select class="category_body" name="receiver_class">
                            <option>Alege</option>
                            <?php
                                $rec_class=$pfm->get_receiver_classes();
                                for($i=0;$i<count($rec_class);$i++){
                                    if(isset($_SESSION['product_rec_class']) && $_SESSION['product_rec_class']===$rec_class[$i]){
                                        echo "<option selected>".$rec_class[$i]."</option>";    
                                    }else{
                                        echo "<option>".$rec_class[$i]."</option>";
                                    }
                                }
                            ?>
                    </select>
                </section>

                <section class="product_filter_category" id="filter_button_container">
                    <div class="product_category">
                        <input type="checkbox" class="filter_checkbox">
                        <span class="checkbox_label">Toate produsele</span> 
                    </div>
                    <div class="filter_button_panel">
                        <button class="filter_button" type="submit">
                            Search
                        </button>
                        <button class="filter_button">
                            Reset
                        </button>
                    </div>    
                </section>    


</form>




