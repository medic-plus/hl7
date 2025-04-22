<?php


class MaritalStatus
{
    private static $statuses = [
        'D' => 'DIVORCIADO',
        'M' => 'CASADO',
        'U' => 'SOLTERO',
        'W' => 'VIUDO',
        'T' => 'UNIÓN LIBRE',
        'L' => 'SEPARADO'
    ];

    public static function getStatus($code)
    {
        if (array_key_exists($code, self::$statuses)) {
            return [
                'value' => $code,
                'name' => self::$statuses[$code]
            ];
        }

        return null;
    }
}
