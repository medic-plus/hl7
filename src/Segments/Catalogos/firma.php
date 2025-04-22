<?php

class SignatureValidation
{
    private static $signatures = [
        'S' => 'FIRMADO',
        'X' => 'SE REQUIERE LA FIRMA',
    ];

    public static function getSignatureValidation($code)
    {
        if (array_key_exists($code, self::$signatures)) {
            return [
                'value' => $code,
                'name' => self::$signatures[$code]
            ];
        }
        return null;
    }
}

?>
