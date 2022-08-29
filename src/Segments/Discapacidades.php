<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\Discapacidad;

class Discapacidades {
    private string $descripcion;
    private int $identificadorUnicoDiscapacidad;
    private ?Discapacidad $discapacidad;

    public function __construct(string $descripcion, int $identificadorUnicoDiscapacidad, Discapacidad $discapacidad = null) {
        $this->descripcion = $descripcion;
        $this->identificadorUnicoDiscapacidad = $identificadorUnicoDiscapacidad;
        $this->discapacidad = $discapacidad;
    }

    public function getDiscapacidades() {
        return $this->descripcion;
    }

    public function setDiscapacidades(string $descripcion) {
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

    public static function parseXML(DOMDocument $DOM, array $descripcion = []) {
        if (sizeof($descripcion) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);

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

        $title = $DOM->createElement('title', 'Descripción de discapacidades y estado del funcionamiento');
        $section->appendChild($title);

        $descripcionContent = array_map(function ($descripcionDiscapacidad) {
            return $descripcionDiscapacidad->getDiscapacidades();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        $entry = $DOM->createElement('entry', '');
        $entry->setAttribute('typeCode', 'DRIV');
        $section->appendChild($entry);

        $observation = $DOM->createElement('observation', '');
        $observation->setAttribute('classCode', 'OBS');
        $observation->setAttribute('moodCode', 'EVN');
        $entry->appendChild($observation);

        $id = $DOM->createElement('id', '');
        $id->setAttribute('root', '--Identificador único de la discapacidad del paciente--');
        $observation->appendChild($id);

        $code1 = $DOM->createElement('code', '');
        $code1->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code1->setAttribute('codeSystemName', 'SNOMED CT');
        $code1->setAttribute('code', '248536006');
        $code1->setAttribute('displayName', 'Discapacidades');
        $observation->appendChild($code1);

        $statusCode = $DOM->createElement('statusCode', '');
        $statusCode->setAttribute('code', 'completed');
        $observation->appendChild($statusCode);

        $value = $DOM->createElement('value', '');
        $value->setAttribute('xsi:type', 'CD');
        $value->setAttribute('codeSystem', '2.16.840.1.113883.6.254');
        $value->setAttribute('codeSystemName', 'CIF');
        $value->setAttribute('code', '--Valor del identificador de discapacidad de acuerdo a catálogo--');
        $value->setAttribute('displayName', '--Nombre de discapacidad de acuerdo a catálogo--');
        $observation->appendChild($value);

        return $DOM;
    }
}