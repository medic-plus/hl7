<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class Alergias {

    private string $alergias;

    public function __construct(string $alergias) {
        $this->alergias = $alergias;
    }

    public function getAlergias() {
        return $this->alergias;
    }

    public function setAlergias(string $alergias) {
        $this->alergias = $alergias;
    }

    public static function parseXML(DOMDocument $DOM, array $alergias = []) {
        if (sizeof($alergias) == 0) {
            return $DOM;
        }
        //Component
        $component = $DOM->createElement('component', '');
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);
        //Section
        $section = $DOM->createElement('section', '');
        $component->appendChild($section);
        //TemplateID
        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.22');
        $section->appendChild($templateId);
        //Code
        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '48765-2');
        $code->setAttribute('displayName', 'Alergias');
        $section->appendChild($code);
        //Title
        $title = $DOM->createElement('title', 'Alergias y reacciones adversas');
        $section->appendChild($title);
        //Text
        $alergiasContent = array_map(function ($alergia) {
            return $alergia->getAlergias();
        }, $alergias);
        $text = $DOM->createElement('text', implode("\n", $alergiasContent));
        $section->appendChild($text);

        return $DOM;
    }
}
