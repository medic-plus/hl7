<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class ImpresionDiagnostica {
    private string $impresionDiagnostica;

    public function __construct(string $impresionDiagnostica) {
        $this->impresionDiagnostica = $impresionDiagnostica;
    }

    public function getImpresionDiagnostica() {
        return $this->impresionDiagnostica;
    }

    public function setImpresionDiagnostica(string $impresionDiagnostica) {
        $this->impresionDiagnostica = $impresionDiagnostica;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Impresion", $this->impresionDiagnostica);
        $documento->appendChild($segmento);
    }

    public static function parseXML(DOMDocument $DOM, array $impresionDiagnostica = []) {
        if (sizeof($impresionDiagnostica) == 0) {
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
        $code->setAttribute('code', '51848-0');
        $code->setAttribute('displayName', 'Impresión diagnóstica');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Impresión diagnóstica');
        $section->appendChild($title);

        $impresionDiagnosticaContent = array_map(function ($impresionesDiagnosticas) {
            return $impresionesDiagnosticas->getImpresionDiagnostica();
        }, $impresionDiagnostica);
        $text = $DOM->createElement('text', implode("\n", $impresionDiagnosticaContent));
        $section->appendChild($text);

        return $DOM;
    }
}