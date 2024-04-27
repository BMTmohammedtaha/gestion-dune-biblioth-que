<?php


require 'config/db.php';
require 'includes/header.php';
require 'includes/nav.php';



$base_url = 'http://localhost:8000/';

$path = trim( parse_url($_SERVER['REQUEST_URI'])['path'],'/');



?>
<div class="container">
    <?php
        require './router.php';
    ?>
</div>
<?php

require 'includes/footer.php';
