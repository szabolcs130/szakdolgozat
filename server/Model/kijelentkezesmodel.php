<?php
namespace Server\Model;
    use Server\ModelCsatlakozas;

class KijelentkezesModel{
  //
    public static function Connection() {
        return Csatlakozas::GetConnection();
    }
}
?>