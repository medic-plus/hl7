<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class Sintomatologia {

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

    public static function parseXML(DOMDocument $DOM, array $manifestacionIniciales = []) {
        if (sizeof($manifestacionIniciales) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '1.3.6.1.4.1.19376.1.5.3.1.1.13.2.1');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '10154-3');
        $code->setAttribute('displayName', 'Manifestaciones Iniciales');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Manifestaciones iniciales');
        $section->appendChild($title);

        $manifestacionInicialesContent = array_map(function ($manifestacionInicial) {
            return $manifestacionInicial->getManifestacionIniciales();
        }, $manifestacionIniciales);

        $text = $DOM->createElement('text', implode("\n", $manifestacionInicialesContent));
        $section->appendChild($text);

        return $DOM;
    }
}