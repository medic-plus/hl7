<?php

class LegaluthenticatorSection extends Patient {
    static function getLegalAuthenticatorSection(Patient $patient) {
        $attributes = $patient->attributes;
        $legalAuthenticator = [
            'legalAuthenticator' => [
                'time' => [
                    '_attributes' => [
                        'value' => $attributes->legalAuthenticator['time']
                    ]
                ],
                'assignatureCode' => [
                    '_attributes' => [
                        'code' => $attributes->legalAuthenticator['signature']
                    ]
                ],
                'assignedEntity' => [
                    'id' => [
                        '_attributes' => [
                            'root' => null,
                            'extension' => $attributes->legalAuthenticator['entity']['professionalId']
                        ]
                    ],
                    'addr' => [
                        'fullAddress' => [$attributes->legalAuthenticator['entity']['address']['fullAddress']],
                        'streetNameType' => [$attributes->legalAuthenticator['entity']['address']['streetNameType']],
                        'streetName' => [$attributes->legalAuthenticator['entity']['address']['streetName']],
                        'houseNumberNumeric' => [$attributes->legalAuthenticator['entity']['address']['houseNumberNumeric']],
                        'houseNumber' => [$attributes->legalAuthenticator['entity']['address']['houseNumber']],
                        'unitID' => [$attributes->legalAuthenticator['entity']['address']['unitId']],
                        'unitType' => [$attributes->legalAuthenticator['entity']['address']['unitType']],
                        'deliveryInstallationType' => [$attributes->legalAuthenticator['entity']['address']['deliveryInstallationType']],
                        'deliveryInstallationArea' => [$attributes->legalAuthenticator['entity']['address']['deliveryInstallationArea']],
                        'precint' => [$attributes->legalAuthenticator['entity']['address']['precint']],
                        'county' => [$attributes->legalAuthenticator['entity']['address']['county']],
                        'state' => [$attributes->legalAuthenticator['entity']['address']['state']],
                        'postalCode' => [$attributes->legalAuthenticator['entity']['address']['postalCode']],
                        'country' => [$attributes->legalAuthenticator['entity']['address']['country']],
                    ],
                    'telecom' => [
                        [
                            '_attributes' => [
                                'value' => $attributes->legalAuthenticator['entity']['phone']
                            ]
                        ],
                        [
                            '_attributes' => [
                                'value' => $attributes->legalAuthenticator['entity']['email']
                            ]
                        ]
                    ],
                    'assignedPerson' => [
                        'name' => [
                            'given' => $attributes->legalAuthenticator['entity']['person']['given'],
                            'family' =>  $attributes->legalAuthenticator['entity']['person']['first_surname'],
                            'family' =>  $attributes->legalAuthenticator['entity']['person']['second_surname'],
                        ],
                    ],
                ],
            ],
        ];

        return $legalAuthenticator;
    }
}

?>