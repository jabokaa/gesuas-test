<?php
namespace Gesuas\Test\Helper;

use Gesuas\Test\Models\Citizen;

class Nis
{

    public function __construct(public ?Citizen $citizen = null)
    {
        if (!$this->citizen) {
            $this->citizen = new Citizen();
        }
    }

    /**
     * Gera um NIS unico
     * @param string $name
     * @return int
     */
    public function generateNisCrc32Name(string $name): int
    {
        // geramos um numero unico para o nome de 9 digitos
        $newNis = $this->generetCrc32($name);
        while (true) { 
            $nis = $this->citizen->getByNis($newNis);
            if (!$nis) {
                return $newNis;
            }
            if($nis == 99999999999) {
                $nis = time() . 0;
            }
            $newNis++;
        }
    }

    /**
     * Gera um NIS unico para o nome
     * @param string $name
     * @return int
     */
    private function generetCrc32(string $name)
    {
        $crc32 = crc32($name);

        if (strlen($crc32) > 11) {
            //se for maior que 11 deicha so so 11 primeiros digitos
            $crc32 = substr($crc32, 0, 11);
        } else if (strlen($crc32) < 11) {
            //se for menor que 11 completa com 0
            $crc32 = str_pad($crc32, 11, '0', STR_PAD_RIGHT);
        }

        return $crc32;
    }
}