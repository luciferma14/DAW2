<?php
require_once "personajesController.php";

$controller = new PersonajesController($pdo);
$controller->handleRequest();
