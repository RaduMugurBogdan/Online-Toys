<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Main Frame</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./View/client_side/main_frame/frame_style.css">
        <link rel="stylesheet" href="./View/client_side/product_mini_view/pmv_style.css">
        <?php
            include './View/client_side/Components/imports/main_frame_imports.php';
        ?>
    </head>
    <body>
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
                        
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        <div class="product_mini_view">
                            <div class="product_mini_picture"><img src="./View/client_side/resurse/car.jpg" class="product_image"></div>
                            <div class="product_mini_description">Masina HotWheels</div>
                            <button class="add_to_chart_button"><i class='fas fa-shopping-cart add_to_chart_button_icon'></i>  Add to chart</button>
                            <hr class="view_sep">
                            <div class="product_price_description">Pret: <span class="main_price">30</span>,<sub class="sec_price">99</sub> ron</div>
                        </div>  
                        
                    </section>
        
                    <section id="page_buttons_panel">
                            <button class="page_buttons"><i class="fa fa-arrow-circle-left" style="font-size:30px"></i></button>
                            <span id="page_label">Page 1/<sub>100</sub> </span>
                            <button class="page_buttons"><i class="fa fa-arrow-circle-right" style="font-size:30px"></i></button>
                    </section>
        
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
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </body>
</html>