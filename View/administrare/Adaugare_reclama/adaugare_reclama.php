<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Toys</title>
    <link rel="stylesheet" href="../View/administrare/Componente/mini_personal_view/mini_personal_view.css">
    <link rel="stylesheet" href="../View/administrare/Adaugare_reclama/adaugare_reclama.css">
    <link rel="stylesheet" media="(max-width: 414px)" href="../View/administrare/Adaugare_reclama/resp_adaugare_reclama.css">  
</head>
<body>
    <nav class="lng-meniu">
        <a href="#"><span><img src="../Icons/comenzi.png" alt="comenzi"></span>Comenzi</a>
        <a href="#"><span><img src="../Icons/users.png" alt="users"></span>Utilizatori</a>
        <a href="../Adaugare_produs/adaugare_produs.html"><span><img src="../Icons/add.png" alt="add"></span>Adaugare produs</a>
        <a href="#" style="color: lightcoral"><span><img src="../Icons/add.png" alt="add" ></span>Adaugare reclama</a>
        <a href="../Pagina_principala/homepage.html"><span><img src="../Icons/tasks.png" alt="Homepage" ></span>Homepage</a>
        <a href="#" id="lng-account"><span><img src="../Icons/avatar.png" alt="avatar"></span>Username</a>
    </nav>
    <section id="adv_main_container"> 
                       
            <form id="inputs_container"  enctype="multipart/form-data" method="POST" action="http://localhost/ProiectTW/Online-Toys/Model/adv_model.php?action=insert_adv">
                <span class="input_label title">
                Inserati reclame
                </span>
                <div class="input_panel">
                    <span class="input_label">
                        Poza
                    </span>
                    <input type="file" name="adv_picture" multiple class="input_field" id="picture_field">
                    <span class="error_field" id="picture_error">
                    </span>
                </div>
                <div class="input_panel">
                    <span class="input_label">
                        Motto
                    </span>
                    <textarea name="adv_quote" class="input_field" id="motto_field">
                    </textarea>
                    <span class="error_field" id="motto_error">
                    </span>
                </div>
                <div class="input_panel">
                    <input type="button" onclick="perform_submit()" value="Salveaza"  class="input_field">
                </div>
            </form>  
            <section class="main_posts_container">
                <?php
                    include './Model/database_model.php';
                    include './Model/adv_model.php';
                    $adv=new AdvModel();
                    $results=$adv->get_advs();
                    for($i=0;$i<count($results);$i++){
                ?>
                <section class="post_container">
                    <section class="mini_view_info">
                        <section class="mini_view_picture">
                            <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($results[$i]['poza']) ?>" class="picture">
                        </section>
                        <section class="mini_view_labels">   
                            <span class="brand_name_container"><?php echo $results[$i]['reclama'];?></span>
                        </section>
                    </section>
                    <section class="options_panel">
                        <section class="post_option"><a href="./Model/adv_model.php?action=delete_adv&adv_id=<?php echo $results[$i]['id'];?>">Sterge</a></section>
                    </section>
                </section>
                <?php
                    }
                ?>
            </section>
    </section>    
    <script src="../View/administrare/Adaugare_reclama/adaugare_reclama.js">
    </script>
</body>
</html>