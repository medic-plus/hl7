<?php

class EpisodeType {
    private static $types = [
        'EMER' => 'Emergencias',
        'IMP'  => 'Hospitalizacion',
        'AMB'  => 'Ambulatorio',
        'HH'   => 'Cuidados Caseros',
        'ACUTE' => 'Cuidados Intensivos / Hospitalización Aguda'
    ];

    public static function getType($code) {
        if (isset(self::$types[$code])) {
            return [
                'value' => $code,
                'name' => self::$types[$code]
            ];
        }
        return null;
    }
}

?>