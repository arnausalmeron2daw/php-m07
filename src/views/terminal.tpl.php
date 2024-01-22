<?php

include_once 'partials/header.tpl.php'


?>
<body>

<main>
    <h1 class="maintitle" >Terminal de pago</h1>

    <form action="/terminal/payment" method="POST">
        <input type="text" placeholder="Your Card Number" name="cardnum" require>
        <input type="text" placeholder="Your Expiration Date" name="expiration" require>
        <input type="text" placeholder="Your CSV" name="csv" require>
        <button type="submit" value="enviar">Comenzar prueba gratuita de 30 dias</button>
    </form>
    
    <a class="link_home" href="/subscription">Return Subs</a>

</main>

<?php include_once 'partials/footer.tpl.php' ?>

</body>
</html>