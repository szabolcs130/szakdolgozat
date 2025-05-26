<?php
class Request{
    public static function Get($keres){
        if (isset($_GET[$oldal])) {
            return htmlspecialchars(isset($_GET[$oldal]));
        }
        return null;
    }
}
?>