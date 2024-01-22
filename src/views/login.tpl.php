<?php

include_once 'partials/header.tpl.php'


?>
<body>

<main>

<h2>Login</h2>
<form action="/login/log" method="POST">
    <input type="email" placeholder="Your Email" name="email" require>
    <input type="password" placeholder="Your Password" name="password" require>
    <button type="submit" value="enviar">LogIn</button>
</form>



<a class="link_home" href="/">Return Home</a>

</main>
<?php include_once 'partials/footer.tpl.php' ?>    
</body>
</html>