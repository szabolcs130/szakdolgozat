<?php
namespace Server\Model;
    use Server\Model\Csatlakozas;

class KijelentkezesModel{
  //
    public static function Connection() {
        return Csatlakozas::GetConnection();
    }
}
?>