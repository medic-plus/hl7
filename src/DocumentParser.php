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

    private Documento $documento;
    private DOMDocument $DOM;
    private \Medicplus\HL7\Config $config;

    /**
     * DocumentParser constructor
     *
     * @param \Medicplus\HL7\Config $config
     */
    public function __construct(?Config $config, ?Documento $documento) {
        $this->documento = $documento ?? new Documento();
        $this->config = $config ?? new Config();
        $this->resetDOM();
    }

    public function resetDOM() {
        $this->DOM = new DOMDocument('1.0', 'UTF-8');
        $this->DOM->preserveWhiteSpace = false;
        $this->DOM->formatOutput = true;
    }

    public function getDOM(): DOMDocument {
        return $this->DOM;
    }

    public function getDocumento(): Documento {
        return $this->documento;
    }

    public function setDocumento(Documento $documento) {
        $this->documento = $documento;
        $this->resetDOM();
    }

    public function parseAlergias() {
        $this->DOM = Alergias::parseXML($this->DOM, $this->documento->getAlergias());
    }

    public function toXML() {
        $this->parseAlergias();
        return $this->DOM->saveXML();
    }
}