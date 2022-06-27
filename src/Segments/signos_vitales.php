<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\SignoVital;

class signos_vitales {
    private string $descripcion;
    private string $nombre;
    private ?DateTime $fechaSignoVital;
    private string $resultadoMedicion;
    private ?SignoVital $signoVital;

    public function __construct(string $descripcion, string $nombre, DateTime $fechaSignoVital = null, string $resultadoMedicion, SignoVital $signoVital = null) {
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
}
