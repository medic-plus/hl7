<?php

class AuthorSection
{
    static function getAuthorSection(Patient $patient)
    {
        $author = $patient->attributes->author;
        $author = [
            'author' => [
                'time' => [
                    '_attributes' => [
                        'value' => $author['time'],
                    ]
                ],
                'assignedAuthor' => [
                    'id' => [
                        '_attributes' => ['root' => $author['id']]
                    ],
                    'assignedAuthoringDevice' => [
                        'softwareName' => $author['softwareName'],
                        'manufacturerModelName' => $author['manufacturer'],
                    ]
                ],
                'telecom' => [
                    [
                        '_attributes' => ['value' => $author['phone']]
                    ],
                    [
                        '_attributes' => ['value' => $author['email']]
                    ],
                ],
                'addr' => [
                    'fullAddress' => [$author['address']['fullAddress']],
                    'streetNameType' => [$author['address']['streetNameType']],
                    'streetName' => [$author['address']['streetName']],
                    'houseNumberNumeric' => [$author['address']['houseNumberNumeric']],
                    'houseNumber' => [$author['address']['houseNumber']],
                    'unitID' => [$author['address']['unitId']],
                    'unitType' => [$author['address']['unitType']],
                    'deliveryInstallationType' => [$author['address']['deliveryInstallationType']],
                    'deliveryInstallationArea' => [$author['address']['deliveryInstallationArea']],
                    'precint' => [$author['address']['precint']],
                    'county' => [$author['address']['county']],
                    'state' => [$author['address']['state']],
                    'postalCode' => [$author['address']['postalCode']],
                    'country' => [$author['address']['country']],
                ],
                'representedOrganization' => [
                    'id' => [
                        '_attributes' => ['root' => $author['organizationId']]
                    ],
                    'name' => $author['organizationName'],
                ]

            ],
        ];

        return $author;
    }
}
