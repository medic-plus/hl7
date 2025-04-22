<?php

class DischargeReason
{
    private static $reasons = [
        '1' => 'Curación',
        '2' => 'Mejoría',
        '3' => 'Voluntario',
        '4' => 'Pase a otro hospital',
        '5' => 'Defunción',
        '6' => 'Otro motivo',
    ];

    public static function getSignatureValidation($code)
    {
        if (array_key_exists($code, self::$reasons)) {
            return [
                'value' => $code,
                'name' => self::$reasons[$code]
            ];
        }
        return null;
    }
}

?>
