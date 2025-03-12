<?php

class SeccionHeader extends Patient
{
    static function getHeader(Patient $patient)
    {
        $attributes = $patient->attributes;
        $header = [
            'realmCode' => [
                '_attributes' => [
                    'code' => 'MX',
                ]
            ],
            'typeId' => [
                '_attributes' => [
                    'root' => null,
                    'extension' => 'POCD_HD000040'
                ]
            ],
            'templateId' => [
                '_attributes' => [
                    'root' => null,
                ]
            ],
            'id' => [
                '_attributes' => [
                    'root' => $attributes->providerSystem['systemId'],
                    'extension' => $attributes->providerSystem['systemUniqueId'],
                    'assigningAuthorityName' => $attributes->providerSystem['name']
                ]
            ],
            'code' => [
                '_attributes' => [
                    'codeSystem' => null,
                    'codeSystemName' => 'LOINC',
                    'code' => '34133-9',
                    'displayName' => 'Nota Resumen de Episodio'
                ]
            ],
            'title' => 'Resumen Clinico',
            'effectiveTime' => [
                '_attributes' => [
                    'value' => $attributes->documentTime
                ]
            ],
            'confidentialityCode' => [
                '_attributes' => [
                    'codeSystem' => null,
                    'codeSystemName' => 'Confidentiality',
                    'code' => $attributes->documentConfidentiality['value'] ?? null,
                    'displayName' => $attributes->documentConfidentiality['name'] ?? null
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
                    'assigningAuthorityName' => $attributes->providerSystem['name']
                ]
            ],
            'versionNumber' => [
                '_attributes' => [
                    'value' => null
                ]
            ],
        ];

        return $patient->deleteNulls($header);
    }
}
