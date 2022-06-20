<?php

namespace Medicplus\HL7;

use DOMDocument;

class motivo_referencia_contra_referencia {
    private string $motivoReferencia;

    public function getMotivoReferencia() {
        return $this->motivoReferencia;
    }

    public function setMotivoReferencia(string $motivoReferencia) {
        $this->motivoReferencia = $motivoReferencia;
    }

    // public function toXML(DOMDocument $doc, $motivoReferencia) {
    //     $motivoReferencia = $doc->createElement($motivoReferencia);
    //     $text = $doc->createTextNode($this->value);
    //     $motivoReferencia->appendChild($text);
    //     return $motivoReferencia;
    // }
}