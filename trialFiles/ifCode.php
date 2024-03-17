<?php
function weatherAdvisory($temperature) {
    if ($temperature < 0) {
        return "It's freezing cold outside!";
    } elseif ($temperature >= 0 && $temperature < 10) {
        return "You might want to wear a heavy coat.";
    } elseif ($temperature >= 10 && $temperature < 20) {
        return "A light jacket should suffice.";
    } else {
        return "Enjoy the warmth while it lasts!";
    }
}

function noAdvice($garbage) {
    if ($garbage < 0) {
        return "This is garbage!";
    } 
    // elseif ($garbage >= 0 && $garbage < 10) {
    //     return "This is so what garbage";
    // } 
    else {
        return "Enjoy the warmth while it lasts! :)";
    }
}

function noAdvice2($garbage) {
    if ($garbage < 0) {
        return "This is garbage!";
    } 
    elseif ($garbage >= 0 && $garbage < 10) {
        return "This is so what garbage";
    } 
    else {
        return "Enjoy the warmth while it lasts! :)";
    }
}
