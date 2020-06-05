<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./View/administrare/basicStyle.css">  
    <link rel="stylesheet" href="./View/administrare/comenzi/comenzi_style.css">
    <script type="text/javascript" src="./jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="./View/administrare/comenzi/vizualizareComenzi.js"></script> 
    <title>Admin-Comenzi</title>
</head>
<body>
    <?php include './View/administrare/components/meniu.php'; ?>
    <?php include './View/administrare/components/messagePopUp.php'; ?>
    <?php include './View/administrare/components/modal.php'; ?>
    
    <div id="result"></div>
    <section id="lng-content">
        <table>
            <?php echo $template; ?>
        </table>
        <div id="lng-paginare">
            <button id="prev" class="lng-btn"><</button>
            <span id="page"></span>
            <button id="next" class="lng-btn">></button>
        </div>
    </section>  
    
</body>
</html>