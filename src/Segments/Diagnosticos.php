<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\Diagnostico;

class Diagnosticos {
    private string $descripcion;
    private ?DateTime $fechaIniProblemaDiagnostico;
    private ?DateTime $fechaFinProblemaDiagnostico;
    private int $identificadorUnicoAfeccion;
    private float $numeroAfeccion;
    private string $nombreTipoDiagnostico;
    private string $descripcionProblemaDiagnosticado;
    private ?Diagnostico $diagnostico;

    public function __construct(string $descripcion, int $identificadorUnicoAfeccion, float $numeroAfeccion, string $nombreTipoDiagnostico, string $descripcionProblemaDiagnosticado, DateTime $fechaIniProblemaDiagnostico = null, DateTime $fechaFinProblemaDiagnostico = null, Diagnostico $diagnostico = null) {
        $this->descripcion = $descripcion;
        $this->fechaIniProblemaDiagnostico = $fechaIniProblemaDiagnostico;
        $this->fechaFinProblemaDiagnostico = $fechaFinProblemaDiagnostico;
        $this->identificadorUnicoAfeccion = $identificadorUnicoAfeccion;
        $this->numeroAfeccion = $numeroAfeccion;
        $this->nombreTipoDiagnostico = $nombreTipoDiagnostico;
        $this->descripcionProblemaDiagnosticado = $descripcionProblemaDiagnosticado;
        $this->diagnostico = $diagnostico;
    }

    public function getDescripcionDiagnosticos() {
        return $this->descripcion;
    }

    public function setDescripcionDiagnosticos(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFechaIniProblemaDiagnostico() {
        return $this->fechaIniProblemaDiagnostico;
    }

    public function setFechaIniProblemaDiagnostico(DateTime $fechaIniProblemaDiagnostico) {
        $this->fechaIniProblemaDiagnostico = $fechaIniProblemaDiagnostico;
    }

    public function getFechaFinProblemaDiagnostico() {
        return $this->fechaFinProblemaDiagnostico;
    }

    public function setFechaFinProblemaDiagnostico(DateTime $fechaFinProblemaDiagnostico) {
        $this->fechaFinProblemaDiagnostico = $fechaFinProblemaDiagnostico;
    }

    public function getIdentificadorUnicoAfeccion() {
        return $this->identificadorUnicoAfeccion;
    }

    public function setIdentificadorUnicoAfeccion(int $identificadorUnicoAfeccion) {
        $this->identificadorUnicoAfeccion = $identificadorUnicoAfeccion;
    }

    public function getNumeroAfeccion() {
        return $this->numeroAfeccion;
    }

    public function setNumeroAfeccion(float $numeroAfeccion) {
        $this->numeroAfeccion = $numeroAfeccion;
    }

    public function getNombreTipoDiagnostico() {
        return $this->nombreTipoDiagnostico;
    }

    public function setNombreTipoDiagnostico(string $nombreTipoDiagnostico) {
        $this->nombreTipoDiagnostico = $nombreTipoDiagnostico;
    }

    public function getDescripcionProblemaDiagnosticado() {
        return $this->descripcionProblemaDiagnosticado;
    }

    public function setDescripcionProblemaDiagnosticado(string $descripcionProblemaDiagnosticado) {
        $this->descripcionProblemaDiagnosticado = $descripcionProblemaDiagnosticado;
    }

    public function getDiagnostico() {
        return $this->diagnostico;
    }

    public function setDiagnostico(Diagnostico $diagnostico) {
        $this->diagnostico = $diagnostico;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Descripcion", $this->descripcion);
        $documento->appendChild($segmento);
    }

    public static function parseXML(DOMDocument $DOM, array $alergias = []) {
        if (sizeof($alergias) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.5');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.5.1');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '11450-4');
        $code->setAttribute('displayName', 'Lista de Problemas');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Diagnósticos y problemas de salud');
        $section->appendChild($title);

        $descripcionsContent = array_map(function ($descripcionDiagnostico) {
            return $descripcionDiagnostico->getDescripcionDiagnosticos();
        }, $alergias);
        $text = $DOM->createElement('text', implode("\n", $descripcionsContent));
        $section->appendChild($text);

        return $DOM;
    }
}