<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class sintomatologia_paciente {

    private string $manifestacionIniciales;

    public function getManifestacionIniciales() {
        return $this->manifestacionIniciales;
    }

    public function setManifestacionIniciales(string $manifestacionIniciales) {
        $this->manifestacionIniciales = $manifestacionIniciales;
    }

    // public function toXML(DOMDocument $doc, $manifestacionIniciales) {
    //     $manifestacionIniciales = $doc->createElement($manifestacionIniciales);
    //     $text = $doc->createTextNode($this->value);
    //     $manifestacionIniciales->appendChild($text);
    //     return $manifestacionIniciales;
    // }
}
