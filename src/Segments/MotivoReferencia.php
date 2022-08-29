<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class MotivoReferencia {
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

    public static function parseXML(DOMDocument $DOM, array $motivoReferencia = []) {
        if (sizeof($motivoReferencia) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '1.3.6.1.4.1.19376.1.5.3.1.3.1');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '42349-1');
        $code->setAttribute('displayName', 'Motivo de Referencia');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Motivo de la referencia');
        $section->appendChild($title);

        $motivoReferenciaContent = array_map(function ($motivosReferencias) {
            return $motivosReferencias->getMotivoReferencia();
        }, $motivoReferencia);
        $text = $DOM->createElement('text', implode("\n", $motivoReferenciaContent));
        $section->appendChild($text);

        return $DOM;
    }
}
