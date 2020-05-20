<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="./View/administrare/home_page/home_page_style.css">   
    <link rel="stylesheet" media="(max-width: 414px)" href="./View/administrare/home_page/resp_home_page_style.css">
    <title>Admin</title>
</head>

<body>
    <?php include './View/administrare/components/meniu.php'; ?>

    <section id="lng-content">
        <div id="lng-vanzari">
            <label>Vanzari</label>
            <img src="./View/administrare/resurse/line-chart.png" alt="chart">
        </div>
        <div id="lng-utilizatorinoi">
            <label>Utilizatori</label>
            <span id="lng-count-users">+346</span>
        </div>
        <div id="lng-comenzinoi">
            <label>Comenzi</label>
            <img src="./View/administrare/resurse/column-chart.png" alt="chart">
        </div>
        <div id="lng-produsenoi">
            <label>Stoc</label>
            <table id="lng-stoc">
                <tr>
                    <th>Produs</th>
                    <th>Cantitate</th>
                </tr>
                <tr>
                    <td>Jucarii</td>
                    <td>2000u</td>
                </tr>
                <tr>
                    <td>Puzzle</td>
                    <td>15000u</td>
                </tr>
                <tr>
                    <td>Puzzle</td>
                    <td>15000u</td>
                </tr>
            </table>
        </div>
    </section>
</body>
</html>

