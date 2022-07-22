<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\SignoVital;

class SignosVitales {
    private string $descripcion;
    private string $nombre;
    private ?DateTime $fechaSignoVital;
    private string $resultadoMedicion;
    private ?SignoVital $signoVital;

    public function __construct(string $descripcion, string $nombre, string $resultadoMedicion, DateTime $fechaSignoVital = null, SignoVital $signoVital = null) {
        $this->descripcion = $descripcion;
        $this->nombre = $nombre;
        $this->fechaSignoVital = $fechaSignoVital;
        $this->resultadoMedicion = $resultadoMedicion;
        $this->signoVital = $signoVital;
    }

    public function getDescripcionSignosVitales() {
        return $this->descripcion;
    }

    public function setDescripcionSignosVitales(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getNombreSignoVital() {
        return $this->nombre;
    }

    public function setNombreSignoVital(string $nombre) {
        $this->nombre = $nombre;
    }

    public function getFechaSignoVital() {
        return $this->fechaSignoVital;
    }

    public function setFechaSignoVital(DateTime $fechaSignoVital) {
        $this->fechaSignoVital = $fechaSignoVital;
    }

    public function getResultadoMedicionSignoVital() {
        return $this->resultadoMedicion;
    }

    public function setResultadoMedicionSignoVital(string $resultadoMedicion) {
        $this->resultadoMedicion = $resultadoMedicion;
    }

    public function getSignoVital() {
        return $this->signoVital;
    }

    public function setSignoVital(SignoVital $signoVital) {
        $this->signoVital = $signoVital;
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
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.4');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '8716-3');
        $code->setAttribute('displayName', 'Signos Vitales');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Signos Vitales');
        $section->appendChild($title);

        $descripcionContent = array_map(function ($descripcionSignoVital) {
            return $descripcionSignoVital->getDescripcionSignosVitales();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        return $DOM;
    }
}