<section id="client_mini_view">
    <table id="results_table">
        <tr id="table_header"> 
            <td>No.</td>    
            <td>Nume</td>
            <td>Prenume</td>
            <td>E-mail</td>
            <td>Telefon</td>
            <td>Judet</td>
            <td>Localitate</td>
            <td>Detalii</td>
            <td>Ist. Cumparaturi</td>
        </tr>
        <?php
            if(!isset($_SESSION)){
                session_start();
            }
            if(isset($_SESSION['users_filter_result'])){
                $result=$_SESSION['users_filter_result'];
                for($i=0;$i<count($result);$i++){
                    echo '<tr class="record_row">';
                    echo "<td>".($i+1)."</td>";    
                    echo "<td>".$result[$i]['NUME']."</td>";
                    echo "<td>".$result[$i]['PRENUME']."</td>";
                    echo "<td>".$result[$i]['EMAIL']."</td>";
                    echo "<td>".$result[$i]['TELEFON']."</td>";
                    echo "<td>".$result[$i]['judet']."</td>";
                    echo "<td>".$result[$i]['localitate']."</td>";
                    echo '<td  onclick="show_details(this)">Afiseaza<span class="hidden_details">'.$result[$i]['detalii'].'</span></td>';
                    echo "</tr>";   
                }
            }
        ?>
        
    </table>
<section>