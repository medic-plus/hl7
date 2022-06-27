<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class Alergias {

    private string $alergias;

    public function __construct(string $alergias) {
        $this->alergias = $alergias;
    }

    public function getAlergias() {
        return $this->alergias;
    }

    public function setAlergias(string $alergias) {
        $this->alergias = $alergias;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Alergia", $this->alergias);
        $documento->appendChild($segmento);
    }
}
