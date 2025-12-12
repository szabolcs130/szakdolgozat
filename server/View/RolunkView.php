<?php
namespace Server\View;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class RolunkView{
    public static function Main(){
        echo '<div id="rolunkTarolo">';
        echo '<div id="cim"><h1>Szakolgozat</h1></div>';
        echo '<div id="rolunkTartalom">';
        echo '<div><p>Webáruház, ahol különféle termékek kerülnek árusításra.</p></div>';
        echo '<div id="elerhetosegCim">Elérhetőségek:</div>';
        echo '<div id="elerhetosegekEmail"><p>E-mail:</p><p> admin@admin.com</p></div>';
        echo '<div id="elerhetosegekTelefon"><p>Telefon:</p><p> +36 20 0000000</p></div>';
        echo '<div id="terkepDiv">';
        echo '<iframe id="terkepIframa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2726.3377163909545!2d19.66656467609394!3d46.896076271133445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da7a6c479e1d%3A0xc8292b3f6dc69e7f!2sNeumann%20J%C3%A1nos%20Egyetem%20GAMF%20M%C5%B1szaki%20%C3%A9s%20Informatikai%20Kar!5e0!3m2!1shu!2shu!4v1765570211130!5m2!1shu!2shu" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
/*
        echo '<div></div>';

*/