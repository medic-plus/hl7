<?php

class AuthorSection extends Patient
{
    static function getAuthorSection(Patient $patient)
    {
        $attributes = $patient->attributes;
        $author = [
            'author' => [
                'time' => [
                    '_attributes' => [
                        'value' => $attributes->authorTime
                    ]
                ],
                'assignedAuthor' => [
                    'id' => [
                        '_attributes' => [
                            'root' => $attributes->assignedAuthorId
                        ]
                    ],
                    'assignedAuthoringDevice' => [
                        'softwareName' => $attributes->authorSoftwareName,
                        'manufacturerModelName' => $attributes->authorManufacturerModelName,
                    ]
                ],
                'telecom' => [
                    ['_attributes' => ['value' => $attributes->authorPhone]],
                    ['_attributes' => ['value' => $attributes->authorEmail]],
                ],
                'addr' => [
                    'fullAddress' => [$attributes->authorAddress['fullAddress']],
                    'streetNameType' => [$attributes->authorAddress['streetNameType']],
                    'streetName' => [$attributes->authorAddress['streetName']],
                    'houseNumberNumeric' => [$attributes->authorAddress['houseNumberNumeric']],
                    'houseNumber' => [$attributes->authorAddress['houseNumber']],
                    'unitID' => [$attributes->authorAddress['unitId']],
                    'unitType' => [$attributes->authorAddress['unitType']],
                    'deliveryInstallationType' => [$attributes->authorAddress['deliveryInstallationType']],
                    'deliveryInstallationArea' => [$attributes->authorAddress['deliveryInstallationArea']],
                    'precint' => [$attributes->authorAddress['precint']],
                    'county' => [$attributes->authorAddress['county']],
                    'state' => [$attributes->authorAddress['state']],
                    'postalCode' => [$attributes->authorAddress['postalCode']],
                    'country' => [$attributes->authorAddress['country']],
                ],
                'representedOrganization' => [
                    'id' => ['_attributes' => ['root' => $attributes->authorRepresentedOrganizationId]],
                    'name' => $attributes->authorRepresentedOrganizationName,
                ]

            ],
        ];

        return $patient->deleteNulls($author);
    }
}
