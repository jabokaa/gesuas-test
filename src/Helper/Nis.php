<?php
namespace Gesuas\Test\Helper;

use Gesuas\Test\Models\Citizen;

class Nis
{
    static function generetNisCrc32Name($name)
    {
        $citizen = new Citizen();
        // geramos um numero unico para o nome de 9 digitos
        $rand = crc32($name);
        $plus = 10;
        while (true) { 
            // geramos um numero unico para o nome
            echo $rand;
            $newNis = ($rand . $plus);
            $plus++;
            if (strlen($newNis) > 11) {
                $newNis = substr($newNis, 1);
            }
            $nis = $citizen->getByNis($newNis);
            if (!$nis) {
                return $newNis;
            }
        }
    }
}