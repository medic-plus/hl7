<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class Evolucion {
    private string $evolucionPaciente;

    public function __construct(string $evolucionPaciente) {
        $this->evolucionPaciente = $evolucionPaciente;
    }

    public function getEvolucionPaciente() {
        return $this->evolucionPaciente;
    }

    public function setEvolucionPaciente(string $evolucionPaciente) {
        $this->evolucionPaciente = $evolucionPaciente;
    }

    public function toXML(DOMDocument $documento) {
        $segmemto = $documento->createElement("Evolucion", $this->evolucionPaciente);
        $documento->appendChild($segmemto);
    }

    public static function parserXML(DOMDocument $DOM, array $evolucionPaciente = []) {
        if (sizeof($evolucionPaciente) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '1.3.6.1.4.1.19376.1.5.3.1.3.5');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '8648-8');
        $code->setAttribute('displayName', 'Evolucion');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Evolucion durante la atencion');
        $section->appendChild($title);

        $evolucionPacienteContent = array_map(function ($evolucionesPaciente) {
            return $evolucionesPaciente->getEvolucionPaciente();
        }, $evolucionPaciente);
        $text = $DOM->createElement('text', implode("\n", $evolucionPacienteContent));
        $section->appendChild($text);

        return $DOM;
    }
}