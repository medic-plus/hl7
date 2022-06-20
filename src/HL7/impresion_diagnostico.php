<?php

namespace Medicplus\HL7;

use DOMDocument;

class impresion_diagnostico {
    private string $impresionDiagnostica;

    public function getImpresionDiagnostica() {
        return $this->impresionDiagnostica;
    }

    public function setImpresionDiagnostica(string $impresionDiagnostica) {
        $this->impresionDiagnostica = $impresionDiagnostica;
    }

    // public function toXML(DOMDocument $doc, $impresionDiagnostica) {
    //     $impresionDiagnostica = $doc->createElement($impresionDiagnostica);
    //     $text = $doc->createTextNode($this->value);
    //     $impresionDiagnostica->appendChild($text);
    //     return $impresionDiagnostica;
    // }
}