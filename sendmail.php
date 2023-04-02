<?php

$emp = "frankschroeder1986@gmail.com";
$betreff = "neu";
$from = "From: Frank <frank.schroeder24@gmx.de>\n";
$from .= "Reply-To: frankschroeder1986@gmail.com\n";
$from .= "Content-Type: text/html\n";
$text = "<h1> HTMLWORLDS huhu</h1>";


mail($emp, $betreff, $text, $from);