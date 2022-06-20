<?php

namespace Medicplus\HL7;

use DOMDocument;

class Alergias {

    private string $alergias;

    public function getAlergias() {
        return $this->alergias;
    }

    public function setAlergias(string $alergias) {
        $this->alergias = $alergias;
    }

    public function toXML(DOMDocument $doc) {
        // $doc->createElement("date");
        // $text = $doc->createTextNode($this->value);
        // $alergias->appendChild($text);
        // return $alergias;
        $doc->createElement("date");
        $text = $doc->createTextNode($this->value);
        $doc->appendChild($text);
    }
}
