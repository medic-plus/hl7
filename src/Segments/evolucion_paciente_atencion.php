<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class evolucion_paciente_atencion {
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

    public static function evolucionXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Evolucion durante la atencion');
        $documentoElement3 = $documento->createElement('text', 'Narrativa describiendo brevemente la evolucion que el paciente ha tenido durante esta atencion medica');
        $documento->appendChild($documentoElement);
        $documento->appendChild($documentoElement1);
        $documento->appendChild($documentoElement2);
        $documento->appendChild($documentoElement3);
    }
}

evolucion_paciente_atencion::evolucionXML();
