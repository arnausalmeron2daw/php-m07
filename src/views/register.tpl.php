<?php

include_once 'partials/header.tpl.php'


?>
<body>

<main>
<h2>Register</h2>
<form action="/register/reg" method="POST">
    <input type="name" placeholder="Your Name" name="name" require>
    <input type="email" placeholder="Your Email" name="email" require>
    <input type="password" placeholder="Your Password" name="password" require>
    <button type="submit" value="enviar">Register</button>
</form>

<a class="link_home" href="/">Return Home</a>   

</main>

<?php include_once 'partials/footer.tpl.php' ?>
</body>
</html>