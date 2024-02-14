<?php

//Load functions
foreach ( glob( get_template_directory() . "/functions/*.php" ) as $file ) {
  require_once $file;
}