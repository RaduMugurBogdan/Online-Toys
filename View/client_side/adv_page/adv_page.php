<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Main Frame</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            include './View/client_side/Components/imports/adv_page_imports.php';
        ?>
    </head>
    <body>
        <?php
        include './View/client_side/Components/header/header.php';
        ?>
        
        <section id="frame_body"> 
            <section id="main_adv_container">
            <?php
                include './Model/database_model.php';
                include './Model/adv_model.php';
                $adv=new AdvModel();
                $results=$adv->get_advs();
                for($i=0;$i<count($results);$i++){
                   
            ?>
             <section class="adv_container">
                 <?php
                    if($i%2==0){
                 ?>
                        <div class="picture_container">
                            <?php    
                                echo '<img class="picture_adv" src="data:image/jpeg;base64,'.base64_encode($results[$i]['poza']).'" />';
                            ?>
                        </div>
                        <div class="adv_text_container">
                            <?php echo $results[$i]['reclama'];?>
                        </div>
                   <?php
                    }else{
                    ?>     
                         <div class="adv_text_container">
                            <?php echo $results[$i]['reclama'];?>
                        </div>
                        <div class="picture_container">
                            <?php    
                                echo '<img class="picture_adv" src="data:image/jpeg;base64,'.base64_encode($results[$i]['poza']).'" />';
                            ?>
                        </div>
                        
                <?php
                    }
                ?>
            </section>
            <?php
                }
            ?>
            
<!--       
                
           
                    <section class="adv_container">
                        <div class="picture_container">
                            <img class="picture_adv" src="./View/client_side/resurse/adv_picture1.jpg">
                        </div>
                        <div class="adv_text_container">
                            Hai sa te distrezi cu noi!<br>
                            Joaca-te cu Lego!
                        </div>
                    </section>
        
                    <section class="adv_container">
                        <div class="adv_text_container">
                            Mai multa viteza cu HotWheels<br>
                            Incearca acum!
                        </div>
                        <div class="picture_container">
                            <img class="picture_adv" src="./View/client_side/resurse/adv_picture2.jpg">
                        </div>
                    </section>
                    <section class="adv_container">
                        <div class="picture_container">
                            <img class="picture_adv" src="./View/client_side/resurse/adv_picture3.jpg">
                        </div>
                        <div class="adv_text_container">
                            Incearca noile produse Nerf!<br>
                        </div>
                    </section>
                    <section class="adv_container">
                        <div class="adv_text_container">
                            Fii un star alaturi de Barbie!<br>
                        </div>
                        <div class="picture_container">
                            <img class="picture_adv" src="./View/client_side/resurse/adv_picture4.jpg">
                        </div>
                    </section>
        
-->                
                </section>

                <?php
                    include './View/client_side/Components/footer/footer.php';
                ?>
            </section>
             
            
            <script type="text/javascript" src="./View/client_side/main_frame/main_frame_script.js"></script>
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </body>
</html>