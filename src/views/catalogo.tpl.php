<?php

    include_once 'partials/header.tpl.php';

?>
<body>

<main>

<?php

$fechaInicio = new DateTime($selectSub[0]->start_date); 
$fechaFin = new DateTime($selectSub[0]->end_date);


$diferencia = $fechaInicio->diff($fechaFin);


echo "<p>Faltan " . $diferencia->days . " días hasta el " . $fechaFin->format('d-m-Y') . ".</p>";


if ($diferencia->days <= 7) {
    echo '
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Muestra el modal
                document.getElementById("modal-overlay").style.display = "flex";
            });
        </script>
    ';
        }
?>


    <h2>Catálogo</h2>

    <a class="link_profile" href="/profile">Profile</a>

    <a class="link_profile" href="/subscription">Subscribe</a>

    <?php

    

    
    if(!empty($books)){

        $cont=1;

        echo "<div class='main_cat'>";
        foreach($books as $libro){
            
            echo "<ul>";
            echo "<li>" . "<img src='" . $libro->img ."'> </li>";                    
            echo "<li>" . $libro->title . "</li>";
            echo "<li>" . $libro->author . "</li>";
            echo "<li>" . $libro->genre . "</li>";
            echo "<li>" . $libro->price . "</li>";
            if($selectSub != null){
                if($selectSub[0]->is_active == 1) {
                    echo "<li><a href='/public/libro" . $cont . ".txt'>Leer Libro</a></li>";
                }  
            }            
            echo "</ul>";

            
            $cont++;
    }
    
    echo "</div>";
    }
    
    
    
    ?>




    <a class="link_home" href="/login/logout">Return Home</a>

</main>

    <?php include_once 'partials/footer.tpl.php' ?> 
</body>

</html>