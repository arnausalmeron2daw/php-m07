<?php

include_once 'partials/header.tpl.php'


?>
<body>
<main>
    
<h2>Change Your Profile</h2>

<h3>Change Form</h3>

<form action="/changeprof/updateprof" method="POST">
<?php if(!empty($array_session)){ echo "<p>" . $array_session[0] . "</p>"; } ?>
    <input type="name" placeholder="Your Name" name="name" require>
<?php if(!empty($array_session)){ echo "<p>" . $array_session[1] . "</p>"; } ?>
    <input type="email" placeholder="Your Email" name="email" require>
<?php if(!empty($array_session)){ echo "<p>********</p>"; } ?>
    <input type="password" placeholder="Your Password" name="password" require>
    <button type="submit" value="enviar">Update Profile</button>
</form>

<a class="link_home" href="/profile">Return Profile</a> 

</main>

<?php include_once 'partials/footer.tpl.php' ?>

</body>
</html>