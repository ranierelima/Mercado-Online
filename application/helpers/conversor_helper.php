<?php

function numerosEmReais($numero){
    return "R$ ".number_format($numero,2,",",".");
}