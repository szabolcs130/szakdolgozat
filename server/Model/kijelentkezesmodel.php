<?php
namespace Server\Model;
    use Server\Model\csatlakozas;

class KijelentkezesModel{
  //
    public static function Connection() {
        return csatlakozas::GetConnection();
    }
}
?>