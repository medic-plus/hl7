<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\Diagnostico;

class diagnosticos_problemas_salud {
    private string $descripcion;
    private ?DateTime $fechaIniProblemaDiagnostico;
    private ?DateTime $fechaFinProblemaDiagnostico;
    private int $identificadorUnicoAfeccion;
    private float $numeroAfeccion;
    private string $nombreTipoDiagnostico;
    private string $descripcionProblemaDiagnosticado;
    private ?Diagnostico $diagnostico;

    public function __construct(string $descripcion, DateTime $fechaIniProblemaDiagnostico = null, DateTime $fechaFinProblemaDiagnostico = null, int $identificadorUnicoAfeccion, float $numeroAfeccion, string $nombreTipoDiagnostico, string $descripcionProblemaDiagnosticado, Diagnostico $diagnostico = null) {
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
}