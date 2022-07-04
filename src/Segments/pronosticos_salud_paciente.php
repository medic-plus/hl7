<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class pronosticos_salud_paciente {

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

    public static function pronosticosSaludXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Pronosticos de salud del paciente');
        $documentoElement3 = $documento->createElement('text', 'Pronosticos de la salud del paciente en texto libre');
        $documento->appendChild($documentoElement);
        $documento->appendChild($documentoElement1);
        $documento->appendChild($documentoElement2);
        $documento->appendChild($documentoElement3);
    }
}

pronosticos_salud_paciente::pronosticosSaludXML();
