<?php

use services\ContactService;

include '../services/ContactService.php';

if (isset($_POST)) {
    ContactService::insert();
}