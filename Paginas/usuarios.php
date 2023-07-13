<?php
    
    setcookie("ultima_visita", time(), time() +(30));
    
    if (isset($_COOKIE["ultima_visita"])) {
        echo "Olá, de novo!";
    } else {
        echo "Você é novo por aqui"; 
        setcookie('ultima_visita', time(), time() + (30)); 
    }

?>