<?php

class DataEntererSection extends Patient {
    static function getDataEntererSection(Patient $patient) {
        $attributes = $patient->attributes;
        $dataEnterer = [
            'dataEnterer' => [
                'time' => [
                    '_attributes' => [
                        'value' => $attributes->entererTime
                    ]
                ],
                'assignedEntity' => [
                    'id' => [
                        '_attributes' => [
                            'root' => null,
                            'extension' => $attributes->entererEntityId
                        ]
                    ],
                    'assignedPerson' => [
                        'name' => [
                            'given' => $attributes->entererPersonName['given'],
                            'family' => [
                                [$attributes->entererPersonName['first_surname']],
                                [$attributes->entererPersonName['second_surname']]
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $patient->deleteNulls($dataEnterer);

    }

}

?>