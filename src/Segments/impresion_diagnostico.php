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
}