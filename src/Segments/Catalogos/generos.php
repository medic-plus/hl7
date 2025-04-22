<?php

class Gender
{
    private static $genders = [
        'F' => 'FEMENINO',
        'M' => 'MASCULINO',
        'UNK' => 'DESCONOCIDO'
    ];

    public static function getGender($code)
    {
        if (array_key_exists($code, self::$genders)) {
            return [
                'value' => $code,
                'name' => self::$genders[$code]
            ];
        }
        return null;
    }
}

?>



