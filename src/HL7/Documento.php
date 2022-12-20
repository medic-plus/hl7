<?php

namespace Medicplus\HL7;

use DOMDocument;

class Documento extends DOMDocument {

    private DOMDocument $documento;

    public function __construct() {
        $this->documento = new DOMDocument('1.0', 'UTF-8');
        $this->documento->preserveWhiteSpace = false;
        $this->documento->formatOutput = true;
    }

    public function toXML() {
        return $this->documento->saveXML();
    }
}