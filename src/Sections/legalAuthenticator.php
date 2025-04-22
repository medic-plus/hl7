<?php

class LegaluthenticatorSection {
    static function getLegalAuthenticatorSection(Patient $patient) {
        $legalAuthenticator = $patient->attributes->legalAuthenticator;
        $legalAuthenticatorComponent = [
            'legalAuthenticator' => [
                'time' => [
                    '_attributes' => [
                        'value' => $legalAuthenticator['time'],
                    ]
                ],
                'signatureCode' => [
                    '_attributes' => [
                        'code' => $legalAuthenticator['signature']['value'] ?? null
                    ]
                ],
                'assignedEntity' => [
                    'id' => [
                        '_attributes' => [
                            'root' => null,
                            'extension' => $legalAuthenticator['entity']['professionalId']
                        ]
                    ],
                    'addr' => [
                        'fullAddress' => [$legalAuthenticator['entity']['address']['fullAddress']],
                        'streetNameType' => [$legalAuthenticator['entity']['address']['streetNameType']],
                        'streetName' => [$legalAuthenticator['entity']['address']['streetName']],
                        'houseNumberNumeric' => [$legalAuthenticator['entity']['address']['houseNumberNumeric']],
                        'houseNumber' => [$legalAuthenticator['entity']['address']['houseNumber']],
                        'unitID' => [$legalAuthenticator['entity']['address']['unitId']],
                        'unitType' => [$legalAuthenticator['entity']['address']['unitType']],
                        'deliveryInstallationType' => [$legalAuthenticator['entity']['address']['deliveryInstallationType']],
                        'deliveryInstallationArea' => [$legalAuthenticator['entity']['address']['deliveryInstallationArea']],
                        'precint' => [$legalAuthenticator['entity']['address']['precint']],
                        'county' => [$legalAuthenticator['entity']['address']['county']],
                        'state' => [$legalAuthenticator['entity']['address']['state']],
                        'postalCode' => [$legalAuthenticator['entity']['address']['postalCode']],
                        'country' => [$legalAuthenticator['entity']['address']['country']],
                    ],
                    'telecom' => [
                        [
                            '_attributes' => [
                                'value' => $legalAuthenticator['entity']['phone']
                            ]
                        ],
                        [
                            '_attributes' => [
                                'value' => $legalAuthenticator['entity']['email']
                            ]
                        ]
                    ],
                    'assignedPerson' => [
                        'name' => [
                            'given' => $legalAuthenticator['entity']['person']['given'],
                            'family' =>  [
                                [$legalAuthenticator['entity']['person']['first_surname']],
                                [$legalAuthenticator['entity']['person']['second_surname']],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $legalAuthenticatorComponent;
    }
}

?>