<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\Discapacidad;

class discapacidad_paciente {
    private string $descripcion;
    private int $identificadorUnicoDiscapacidad;
    private ?Discapacidad $discapacidad;

    public function __construct(string $descripcion, int $identificadorUnicoDiscapacidad, Discapacidad $discapacidad = null) {
        $this->descripcion = $descripcion;
        $this->identificadorUnicoDiscapacidad = $identificadorUnicoDiscapacidad;
        $this->discapacidad = $discapacidad;
    }

    public function getDescripcionDiscapacidades() {
        return $this->descripcion;
    }

    public function setDescripcionDiscapacidades(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getIdentificadorUnicoDiscapacidad() {
        return $this->identificadorUnicoDiscapacidad;
    }

    public function setIdentificadorUnicoDiscapacidad(int $identificadorUnicoDiscapacidad) {
        $this->identificadorUnicoDiscapacidad = $identificadorUnicoDiscapacidad;
    }

    public function getDiscapacidad() {
        return $this->discapacidad;
    }

    public function setDiscapacidad(Discapacidad $discapacidad) {
        $this->discapacidad = $discapacidad;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Descripcion", $this->descripcion);
        $documento->appendChild($segmento);
    }

    public static function parserXML(DOMDocument $DOM, array $descripcion = []) {
        if (sizeof($descripcion) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.14');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code->setAttribute('codeSystemName', 'SNOMED CT');
        $code->setAttribute('code', '21134002');
        $code->setAttribute('displayName', 'Discapacidades');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Discapacidades');
        $section->appendChild($title);

        $descripcionContent = array_map(function ($descripcionDiscapacidad) {
            return $descripcionDiscapacidad->getAlergias();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        return $DOM;
    }
}