<?php

include_once 'partials/header.tpl.php'


?>
<body>
<main>
    
<h2>Profile</h2>

<h3>Dades del teu perfil</h3>



<?php



if(!empty($array_session)){

    echo "<p>" . $array_session[1] . "</p>";
    echo "<p>" . $array_session[2] . "</p>";
    echo "<p>" . $array_session[3] . "</p>";
    
    
}


?>

<div class="change">
<a href="/changeprof">Change Your Profile</a> 
</div>

<a class="link_home" href="/catalogo">Return Catalogo</a> 

</main>

<?php include_once 'partials/footer.tpl.php' ?>

</body>
</html>