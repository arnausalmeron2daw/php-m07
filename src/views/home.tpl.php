<?php

include_once 'partials/header.tpl.php'


?>
<body>

<main>
    <h1 class="maintitle" >Home</h1>
    <h2><?=$title;?></h2>
    <h2><?=$user;?></h2>
    
<div class="cont_links" >

    <a href="login">Login</a>
    <a href="register">Register</a>

    </div>

</main>

<?php include_once 'partials/footer.tpl.php' ?>

</body>
</html>