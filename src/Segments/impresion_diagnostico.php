<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class impresion_diagnostico {
    private string $impresionDiagnostica;

    public function __construct(string $impresionDiagnostica) {
        $this->impresionDiagnostica = $impresionDiagnostica;
    }

    public function getImpresionDiagnostica() {
        return $this->impresionDiagnostica;
    }

    public function setImpresionDiagnostica(string $impresionDiagnostica) {
        $this->impresionDiagnostica = $impresionDiagnostica;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Impresion", $this->impresionDiagnostica);
        $documento->appendChild($segmento);
    }

    public static function impresionXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Impresion diagnostica');
        $documentoElement3 = $documento->createElement('text', 'Estado del paciente en evaluacion inicial por profesionales de la salud que lo recibio');
        $documento->appendChild($documentoElement);
        $documento->appendChild($documentoElement1);
        $documento->appendChild($documentoElement2);
        $documento->appendChild($documentoElement3);
    }
}

impresion_diagnostico::impresionXML();
