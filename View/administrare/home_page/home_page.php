<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" href="./View/administrare/basicStyle.css">   
    <link rel="stylesheet" href="./View/administrare/home_page/home_page_style.css">   
    <link rel="stylesheet" media="(max-width: 414px)" href="./View/administrare/home_page/resp_home_page_style.css">
    <script type="text/javascript" src="./jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="./View/administrare/home_page/homepage.js"></script>
    <script src="./plotly/plotly-latest.min.js"></script>
    <title>Admin</title>
</head>

<body>
    <?php include './View/administrare/components/meniu.php'; ?>
    <?php include './View/administrare/components/messagePopUp.php' ?>
    
    <section id="lng-content">
        <div id="lng-vanzari">
           
        </div>
        <div id="lng-utilizatorinoi">
            <label>Utilizatori noi</label>
            <span id="lng-count-users">+<?php echo $usersNoi; ?></span>
        </div>
        <div id="lng-comenzinoi">
            
        </div>
        <div id="lng-produsenoi">
            <label>Stoc</label>
            <table id="lng-stoc">
                <?php echo $tabelProduse; ?>
            </table>
            <div id="lng-paginare">
                <button id="prev" class="lng-btn"><</button>
                <span id="page"></span>
                <button id="next" class="lng-btn">></button>
            </div>
        </div>
    </section>
</body>
</html>

