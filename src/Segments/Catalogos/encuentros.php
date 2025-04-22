<?php

class EncounterType
{
    private static $encounters = [
        'AMB' => 'Ambulatorio',
        'EMER' => 'Emergencia',
        'IMP' => 'Hospitalización',
        'SS' => 'Corta Estancia',
        'HH' => 'Casero',
        'FLD' => 'Fuera del establecimiento de salud',
        'VR' => 'Virtual (telesalud)',
    ];

    public static function getEncounterType($code)
    {
        if (array_key_exists($code, self::$encounters)) {
            return [
                'value' => $code,
                'name' => self::$encounters[$code]
            ];
        }
        return null;
    }
}

?>