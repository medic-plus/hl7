<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class datos_afiliaciones_planos_aseguramiento_paciente {
    private string $datosAfiliaciones;

    public function __construct(string $datosAfiliaciones) {
        $this->datosAfiliaciones = $datosAfiliaciones;
    }

    public function getDatosAfiliaciones() {
        return $this->datosAfiliaciones;
    }

    public function setDatosAfiliaciones(string $datosAfiliaciones) {
        $this->datosAfiliaciones = $datosAfiliaciones;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Datos", $this->datosAfiliaciones);
        $documento->appendChild($segmento);
    }

    public static function parserXML(DOMDocument $DOM, array $datosAfiliaciones = []) {
        if (sizeof($datosAfiliaciones) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.18');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '48768-6');
        $code->setAttribute('displayName', 'Pagador');
        $section->appendChild($templateId);

        $title = $DOM->createElement('title', 'Afiliaciones / Planes de aseguramiento');
        $section->appendChild($title);

        $datosAfiliacionesContent = array_map(function ($datosAfiliacion) {
            return $datosAfiliacion->getDatosAfiliaciones();
        }, $datosAfiliaciones);

        $text = $DOM->createElement('text', implode("\n", $datosAfiliacionesContent));
        $section->appendChild($text);

        return $DOM;
    }
}