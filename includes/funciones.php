<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function esUltimo(string $actual,string $proximo): bool {
    if($actual !== $proximo) {
        return true;
    }
    return false;
}

//funcion que revisa que el usuario esta autentificado

function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

//funcion para verificar si existe session start

function isSession() : void {
    if(!isset($_SESSION)) {
        session_start();
    }
}
function isAdmin() : void {
    if(!isset($_SESSION['admin'])){
        header('Location: /');
    }
}