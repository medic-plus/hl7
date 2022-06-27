<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class sintomatologia_paciente {

    private string $manifestacionIniciales;

    public function __construct(string $manifestacionIniciales) {
        $this->getManifestacionIniciales = $manifestacionIniciales;
    }

    public function getManifestacionIniciales() {
        return $this->manifestacionIniciales;
    }

    public function setManifestacionIniciales(string $manifestacionIniciales) {
        $this->manifestacionIniciales = $manifestacionIniciales;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Manifestacion", $this->manifestacionIniciales);
        $documento->appendChild($segmento);
    }
}