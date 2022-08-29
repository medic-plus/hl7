<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class PronosticosSalud {

    private string $pronosticoSalud;

    public function __construct(string $pronosticoSalud) {
        $this->pronosticoSalud = $pronosticoSalud;
    }

    public function getPronosticoSalud() {
        return $this->pronosticoSalud;
    }

    public function setPronosticoSalud(string $pronosticoSalud) {
        $this->pronosticoSalud = $pronosticoSalud;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Pronostico", $this->pronosticoSalud);
        $documento->appendChild($segmento);
    }

    public static function parseXML(DOMDocument $DOM, array $pronosticoSalud = []) {
        if (sizeof($pronosticoSalud) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '47420-5');
        $code->setAttribute('displayName', 'Evaluación del Estado Funcional');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Pronostico de salud del paciente');
        $section->appendChild($title);

        $pronosticoSaludContent = array_map(function ($pronosticoSalud) {
            return $pronosticoSalud->getPronosticoSalud();
        }, $pronosticoSalud);
        $text = $DOM->createElement('text', implode("\n", $pronosticoSaludContent));
        $section->appendChild($text);

        return $DOM;
    }
}
