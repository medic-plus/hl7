<?php

class SeccionHeader
{
    static function getHeader(Patient $patient)
    {
        $header = $patient->attributes->header;
        $header = [
            'realmCode' => [
                '_attributes' => [
                    'code' => 'MX',
                ]
            ],
            'typeId' => [
                '_attributes' => [
                    'root' => '2.16.840.1.113883.1.3',
                    'extension' => 'POCD_HD000040'
                ]
            ],
            'templateId' => [
                '_attributes' => [
                    'root' => '2.16.840.1.113883.3.215.11.1.1',
                ]
            ],
            'id' => [
                '_attributes' => [
                    'root' => $header['system']['id'],
                    'extension' => $header['system']['uniqueId'],
                    'assigningAuthorityName' => $header['system']['name']
                ]
            ],
            'code' => [
                '_attributes' => [
                    'codeSystem' => '2.16.840.1.113883.6.1',
                    'codeSystemName' => 'LOINC',
                    'code' => '34133-9',
                    'displayName' => 'Nota Resumen de Episodio'
                ]
            ],
            'title' => 'Resumen Clínico',
            'effectiveTime' => [
                '_attributes' => [
                    'value' => $header['time']
                ]
            ],
            'confidentialityCode' => [
                '_attributes' => [
                    'codeSystem' => is_null($header['confidentiality']) ? null : '2.16.840.1.113883.5.25',
                    'codeSystemName' => is_null($header['confidentiality']) ? null : 'Confidentiality',
                    'code' => $header['confidentiality']['value'] ?? null,
                    'displayName' => $header['confidentiality']['name'] ?? null
                ]
            ],
            'languageCode' => [
                '_attributes' => [
                    'code' => 'ex-MX'
                ]
            ],
            'setId' => [
                '_attributes' => [
                    'root' => null,
                    'extension' => null,
                    'assigningAuthorityName' => null
                ]
            ],
            'versionNumber' => [
                '_attributes' => [
                    'value' => $header['version']
                ]
            ],
        ];

        return $header;
    }
}
