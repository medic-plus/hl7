<?php

class Confidencialidad
{
    private static $bajo = ['value' => 'L', 'name' => 'Bajo'];
    private static $moderado = ['value' => 'M', 'name' => 'Moderado'];
    private static $normal = ['value' => 'N', 'name' => 'Normal'];
    private static $restringido = ['value' => 'R', 'name' => 'Restringido'];
    private static $irrestricto = ['value' => 'U', 'name' => 'Irrestricto'];
    private static $muy_restringido = ['value' => 'V', 'name' => 'Muy Restringido'];

    static function getConfidencialidad($confidencialidad)
    {
        switch ($confidencialidad) {
            case 'L':
                return self::$bajo;
                break;
            case 'M':
                return self::$moderado;
                break;
            case 'N':
                return self::$normal;
                break;
            case 'R':
                return self::$restringido;
                break;
            case 'U':
                return self::$irrestricto;
                break;
            case 'V':
                return self::$muy_restringido;
                break;
        }
    }
}
