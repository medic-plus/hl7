<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class motivo_referencia_contra_referencia {
    private string $motivoReferencia;

    public function __construct(string $motivoReferencia) {
        $this->motivoReferencia = $motivoReferencia;
    }

    public function getMotivoReferencia() {
        return $this->motivoReferencia;
    }

    public function setMotivoReferencia(string $motivoReferencia) {
        $this->motivoReferencia = $motivoReferencia;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Motivo", $this->motivoReferencia);
        $documento->appendChild($segmento);
    }
}