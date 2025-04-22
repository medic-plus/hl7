<?php

class AdministrationRoute
{
    private static $routes = [
        '1'  => 'Cutánea en glándula mamaria',
        '2'  => 'Cutánea/local',
        '3'  => 'Enteral a través de sonda',
        '4'  => 'Epidural',
        '5'  => 'Implante (en el sitio de infección)',
        '6'  => 'Implante subcutáneo',
        '7'  => 'Infiltración',
        '8'  => 'Inhalación',
        '9'  => 'Intraarticular',
        '10' => 'Intracavitaria',
        '11' => 'Intradérmica',
        '12' => 'Intralesional',
        '13' => 'Intramuscular',
        '14' => 'Intramuscular profunda y lenta',
        '15' => 'Intranasal',
        '16' => 'Intraocular',
        '17' => 'Intraperitoneal',
        '18' => 'Intrarraquídea',
        '19' => 'Intratecal',
        '20' => 'Intratumoral',
        '21' => 'Intrauterina',
        '22' => 'Intravenosa',
        '23' => 'Intravenosa en bolo',
        '24' => 'Intravenosa en infusión',
        '25' => 'Intravenosa lenta',
        '26' => 'Intravenosa por infusión periférica',
        '27' => 'Intravenosa, por catéter venoso central',
        '28' => 'Intravesical',
        '29' => 'Intravítrea.',
        '30' => 'Mucocutánea',
        '31' => 'Nasal',
        '32' => 'Nasal con nebulización',
        '33' => 'Oftálmica',
        '34' => 'Oral',
        '35' => 'Ótica',
        '36' => 'Rectal',
        '37' => 'Subcutánea',
        '38' => 'Sublingual',
        '39' => 'Tópica',
        '40' => 'Transdérmica',
        '41' => 'Vaginal',
    ];

    public static function getSignatureValidation($code)
    {
        if (array_key_exists($code, self::$routes)) {
            return [
                'value' => $code,
                'name' => self::$routes[$code]
            ];
        }
        return null;
    }
}


?>