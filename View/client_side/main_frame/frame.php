<?php
if(isset($_SESSION)==false){
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Main Frame</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            include './View/client_side/Components/imports/main_frame_imports.php';
        ?>
    </head>
    <body onload="init_page()">
        <?php
            include './View/client_side/Components/header/header.php';
        ?>

        <section id="frame_body"> 
                
            <section id="frame_content">
                <!--

                    products_area

                -->
                    
                <?php
                    include './View/client_side/Components/filter/filter.php';
                ?>

                <section id="view_container">
                    <section id="products_container"> 
                        <?php
                        if(isset($_SESSION['filter_results'])){
                            $results=$_SESSION['filter_results'];
                            for($i=0;$i<count($results);$i++){
                                ?>
                        <div class="product_mini_view">
                            <a href="http://localhost/ProiectTW/Online-Toys/product_page?product_id=<?php echo $results[$i]['product_id'];?>">
                            <div class="product_mini_picture"><img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($results[$i]['poza']) ?>" class="product_image"></div>
                            <div class="product_mini_description"><?php echo $results[$i]['nume_produs']; ?></div>
                            </a>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price"><?php echo $results[$i]['pret_produs'];  ?></span> ron</div>    
                        </div>

                        <?php
                                }
                            }
                        ?>
                        
                    </section>

                    <?php
                         if(isset($_SESSION['filter_results'])){
                    ?>            
                        <section id="page_buttons_panel">
                                <button class="page_buttons" onclick="get_preview_page()"><i class="fa fa-arrow-circle-left" style="font-size:30px"></i></button>
                                <span id="page_label">Page<span id="curent_page"></span>/<sub id="pages_number"></sub> </span>
                                <button class="page_buttons" onclick="get_next_page()"><i class="fa fa-arrow-circle-right" style="font-size:30px"></i></button>
                        </section>
                    <?php
                         }
                    ?>
                </section> 

                <!--

                    /products_area
                -->
            </section>

            <?php
                include './View/client_side/Components/footer/footer.php';
            ?>
        </section>  
        <script type="text/javascript" src="./View/client_side/main_frame/main_frame_script.js">
        </script> 
        <script type="text/javascript" src="./View/client_side/main_frame/pages_view.js">
        </script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </body>
</html>