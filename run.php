<?php

require 'config/db.php';

$migration = new MigrationScript();
$migration->migrate(__DIR__.'/db/gestion_bib.sql');


exec("php -S localhost:8000");