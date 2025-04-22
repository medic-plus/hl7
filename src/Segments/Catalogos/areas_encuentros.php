<?php

class EncounterLocation
{
    private static $locations = [
        'ACC'   => 'Lugar del accidente',
        'AMB'   => 'Ambulancia',
        'ER'    => 'Sala de emergencias',
        'HOSP'  => 'Hospitalización',
        'MOBL'  => 'Unidad Móvil',
        'OF'    => 'Servicios Ambulatorios',
        'PROFF' => 'Consultorio médico',
        'PTRES' => 'Hogar del paciente',
    ];

    public static function getEncounterLocation($code)
    {
        if (array_key_exists($code, self::$locations)) {
            return [
                'value' => $code,
                'name' => self::$locations[$code]
            ];
        }
        return null;
    }
}

?>