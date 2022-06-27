<?php

namespace Medicplus\HL7;

use DOMDocument;
use Medicplus\HL7\Segments\Alergias;

/**
 * Documento HL7
 *
 * @author  Ivan Vasquez  <ivanvasquezp@outlook.com>
 * @author  Omar Acuña
 */
class DocumentParser {

    private DOMDocument $documento;
    private \Medicplus\HL7\Config $config;

    /**
     * Documento constructor.
     *
     * @param \Medicplus\HL7\Config $config
     */
    public function __construct(Config $config) {
        $this->documento = new DOMDocument('1.0', 'UTF-8');
        $this->documento->preserveWhiteSpace = false;
        $this->documento->formatOutput = true;
        $this->config = $config;
    }

    public function getDOM(): DOMDocument {
        return $this->documento;
    }

    public function addAlergia(Alergias $alergia) {
        $alergia->toXML($this->getDOM());
    }

    public function toXML() {
        return $this->documento->saveXML();
    }
}