<?php 

    $autoClose = '<script>setTimeout(function(){'
                    . 'document.getElementById("msg").setAttribute("style","display:none");'                
                    . '},4000)</script>';
    
    if (isset($_SESSION['msg'])) {
        
        switch ($_SESSION['msg']->type) {
            case "Succes":
                $msg_success1 = '<div id="msg" style="background-color: lightgreen;">'
                    . '<div id="msg-content">';
                $msg_success2 = '</div></div>';
                echo $msg_success1.$autoClose.'Succes! '.$_SESSION["msg"]->text.$msg_success2;
                
                break;
            
            case "Error":
                $msg_success1 = '<div id="msg" style="background-color: lightcoral;">'
                    . '<div id="msg-content">';
                $msg_success2 = '</div></div>';
                echo $msg_success1.$autoClose.'Error! '.$_SESSION["msg"]->text.$msg_success2;
                
                break;
            
            case "Warning":
                $msg_success1 = '<div id="msg" style="background-color: yellow;">'
                    . '<div id="msg-content">';
                $msg_success2 = '</div></div>';
                echo $msg_success1.$autoClose.'Warning! '.$_SESSION["msg"]->text.$msg_success2;
                
                break;
            
            case "Info":
                $msg_success1 = '<div id="msg" style="background-color: lightblue;">'
                    . '<div id="msg-content">';
                $msg_success2 = '</div></div>';
                echo $msg_success1.$autoClose.'Info! '.$_SESSION["msg"]->text.$msg_success2;
                
                break;
            
        }
        unset($_SESSION['msg']);
    }
?>
