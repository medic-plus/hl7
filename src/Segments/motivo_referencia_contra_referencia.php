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

    // public static function motivoXML() {
    //     $documento = new DOMDocument('1.0', 'UTF-8');
    //     $documento->formatOutput = true;
    //     $documento->preserveWhiteSpace = false;
    //     $documentElement = $documento->createElement('component', '');
    //     $documentElement1 = $documento->createElement('section', '');
    //     $documentElement2 = $documento->createElement('title', 'Motivo de la referencia');
    //     $documentElement3 = $documento->createElement('text', 'Detalle del motivo de la referencia');
    //     $documento->appendChild($documentElement);
    //     $documento->appendChild($documentElement1);
    //     $documento->appendChild($documentElement2);
    //     $documento->appendChild($documentElement3);
    // }
}

// motivo_referencia_contra_referencia::motivoXML();
