<?php

class DataEntererSection {
    static function getDataEntererSection(Patient $patient) {
        $attributes = $patient->attributes;
        $dataEnterer = [
            'dataEnterer' => [
                'time' => [
                    '_attributes' => [
                        'value' => $attributes->enterer['time']
                    ]
                ],
                'assignedEntity' => [
                    'id' => [
                        '_attributes' => [
                            'root' => $attributes->enterer['id'],
                            'extension' => $attributes->enterer['id']
                        ]
                    ],
                    'assignedPerson' => [
                        'name' => [
                            'given' => $attributes->enterer['person']['given'],
                            'family' => [
                                [$attributes->enterer['person']['first_surname']],
                                [$attributes->enterer['person']['second_surname']]
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $dataEnterer;

    }

}

?>