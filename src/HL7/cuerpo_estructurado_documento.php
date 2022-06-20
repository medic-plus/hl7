<?php

namespace Medicplus\HL7;

use DOMDocument;

class cuerpo_estructurado_documento {
    private string $cuerpoEstructurado;

    public function getCuerpoEstructurado() {
        return $this->cuerpoEstructurado;
    }

    public function setCuerpoEstructurado(string $cuerpoEstructurado) {
        $this->cuerpoEstructurado = $cuerpoEstructurado;
    }

    // public function toXML(DOMDocument $doc, $cuerpoEstructurado) {
    //     $cuerpoEstructurado = $doc->createElement($cuerpoEstructurado);
    //     $text = $doc->createTextNode($this->value);
    //     $cuerpoEstructurado->appendChild($text);
    //     return $cuerpoEstructurado;
    // }
}