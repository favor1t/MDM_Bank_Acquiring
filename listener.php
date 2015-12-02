<?php
require_once('autoload.php');

use MDM\Acquiring\Listener as Listener;

$data = filter_input_array(INPUT_POST);
new Listener($data);
