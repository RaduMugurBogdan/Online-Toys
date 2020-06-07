<?php
    if(isset($_SESSION)==false){
        session_start();
    }
    $product_data=$_SESSION['product_data'][0];
    $product_pics=$_SESSION['product_pictures'];
?>
<html>
    <head>
        <title>Product page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <link rel="stylesheet" href="./View/client_side/product_page_view/product_page_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php
            include "./View/client_side/Components/imports/header_footer_imports.php";
        ?>
    </head>
    <body onload="load_all(<?php echo $_SESSION['log_id'];?>,<?php echo $_GET['product_id'];?>)">
    <?php
            //import the header code
            include './View/client_side/Components/header/header.php';
    ?>
        <section id="product_pres_container">
            <section id="product_pictures_panel">
                <section id="picture_panel">
                    <?php
                        for($i=0;$i<count($product_pics);$i++){
                            echo '<img class="product_picture" src="data:image/jpeg;base64,'.base64_encode($product_pics[$i]['poza']).'" />';
                        }
                    ?>

                </section>
                <section id="buttons_list_panel"> 
                    <i class="fa fa-arrow-circle-left button_object" onclick="preview_picture()"></i>
                    <span id="picture_counter"></span> 
                    <i class="fa fa-arrow-circle-right button_object" onclick="next_picture()"></i>
                </section>
            </section>
            <section id="product_info_panel">
                <div id="product_name_panel"><?php echo $product_data['nume_produs'];?></div>
                <hr class="del_line">
                <div id="price_container"><span id="price_label">Pret: </span><span id="price_value"><?php echo $product_data['pret_produs'];?></span><sub>   RONS</sub></div>
                <hr class="del_line">
                <div id="fav_button_panel">
                    <button class="fav_button" id="chart_button_id" <?php if(isset($_SESSION['log_id'])==false) echo "disabled"; ?> onclick="modify_chart(<?php echo $_SESSION['log_id'];?>,<?php echo $_GET['product_id'];?>)">Adauga in cos</button>        
                    <button class="fav_button" id="fav_button_id"<?php if(isset($_SESSION['log_id'])==false) echo "disabled"; ?> onclick="modify_favorite(<?php echo $_SESSION['log_id'];?>,<?php echo $_GET['product_id'];?>)">Adauga la favorite</button>        
            
                </div>
                <hr class="del_line">
                <div id="contacts_panel">
                </div>
            </section>
        </section>
        <section id="product_info_container">
            <section class="info_section">
                <span class="title_label">Descriere</span>
                <section class='info_data_container'>
                    <div class="info_item">
                        <span class="info_title">Nume Brand</span>
                        <span class="info_value">
                            <?php
                                if(isset($product_data['brand_name'])){
                                    echo $product_data['brand_name'];
                                }
                            ?>
                        </span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Nume Model</span>
                        <span class="info_value">
                                <?php
                                    if(isset($product_data['nume_produs'])){
                                        echo $product_data['nume_produs'];
                                    }
                                ?>
                        </span>
                    </div>
                    
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Categorie jucarie</span>
                        <span class="info_value">
                                <?php
                                    if(isset($product_data['category_name'])){
                                        echo $product_data['category_name'];
                                    }
                                ?>
                        </span>
                    </div>
                    
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Material</span>
                        <span class="info_value">
                                <?php
                                    if(isset($product_data['material'])){
                                        echo $product_data['material'];
                                    }
                                ?>
                        </span>
                    </div>


                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Mod de functionare</span>
                        <span class="info_value">
                                <?php
                                    if(isset($product_data['mod_func'])){
                                        echo $product_data['mod_func'];
                                    }
                                ?>
                        </span>
                    </div>

                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Categorie jucarie</span>
                        <span class="info_value">
                                <?php
                                    if(isset($product_data['category_name'])){
                                        echo $product_data['category_name'];
                                    }
                                ?>
                        </span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Clasa de varsta</span>
                        <span class="info_value">
                                <?php
                                    if(isset($product_data['varsta'])){
                                        echo $product_data['varsta'];
                                    }
                                ?>
                        </span>
                    </div>
                    <hr class="info_del_line">
                    <div class="info_item">
                        <span class="info_title">Destinatari</span>
                        <span class="info_value">
                                <?php
                                    if(isset($product_data['destinatari'])){
                                        echo $product_data['destinatari'];
                                    }
                                ?>
                        </span>
                    </div>
                </section>
                </section>
            <section class="info_section">
            </section>
        </section>
        <?php
            include './View/client_side/Components/footer/footer.php';
        ?>  
        <script src="./View/client_side/product_page_view/aux_script.js"></script>   
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>    
        <script type="text/javascript" src="./View/client_side/main_frame/main_frame_script.js"></script>

    </body>
</html>