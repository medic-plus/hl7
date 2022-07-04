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

    public static function manifestacionXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('title', 'Manifestaciones iniciales');
        $documentoElement2 = $documento->createElement('text', 'Sintomatologia que origina el episodio descripta por el paciente');
        $documento->appendChild($documentoElement);
        $documento->appendChild($documentoElement1);
        $documento->appendChild($documentoElement2);
    }
}

sintomatologia_paciente::manifestacionXML();