<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use Medicplus\HL7\Catalogos\CLUES;
use Medicplus\HL7\Catalogos\TipoAsentamiento;
use Medicplus\HL7\Catalogos\TipoEpisodio;
use Medicplus\HL7\Catalogos\TipoVialidad;

class episodios_salud {
    private string $identificadorEpisodio;
    private int $nombreEpisodio;
    private ?DateTime $fechaIniEpisodio;
    private ?DateTime $fechaFinEpisodio;
    private int $cedulaProfesionalEpisodio;
    private string $nombreMedicoEpisodio;
    private string $apellidoPaternoMedico;
    private string $apellidoMaternoMedico;
    private string $licenciaEpisodio;
    private string $nombreEstablecimiento;
    private int $telefonoEstablecimiento;
    private string $correoEstablecimiento;
    private string $domicilioEstablecimiento;
    private string $nombreVialidadEpisodio;
    private float $numeroExteriorEstablecimiento;
    private string $alfanumericoExterior;
    private float $numeroInteriorEstablecimiento;
    private string $alfanumericoInterior;
    private string $asentamientoDomicilio;
    private string $paisEpisodio;
    private ?TipoEpisodio $tipoEpisodio;
    private ?CLUES $clues;
    private ?TipoVialidad $tipoVialidad;
    private ?TipoAsentamiento $tipoAsentamiento;

    public function getIdentificadorEpisodio() {
        return $this->identificadorEpisodio;
    }

    public function setIdentificadorEpisodio(string $identificadorEpisodio) {
        $this->identificadorEpisodio = $identificadorEpisodio;
    }

    public function getNombreEpisodio() {
        return $this->nombreEpisodio;
    }

    public function setNombreEpisodio(int $nombreEpisodio) {
        $this->nombreEpisodio = $nombreEpisodio;
    }

    public function getFechaIniEpisodio() {
        return $this->fechaIniEpisodio;
    }

    public function setFechaIniEpisodio(DateTime $fechaIniEpisodio) {
        $this->fechaIniEpisodio = $fechaIniEpisodio;
    }

    public function getFechaFinEpisodio() {
        return $this->fechaFinEpisodio;
    }

    public function setFechaFinEpisodio(DateTime $fechaFinEpisodio) {
        $this->fechaFinEpisodio = $fechaFinEpisodio;
    }

    public function getCedulaProfesionalEpisodio() {
        return $this->cedulaProfesionalEpisodio;
    }

    public function setCedulaProfesionalEpisodio(int $cedulaProfesionalEpisodio) {
        $this->cedulaProfesionalEpisodio = $cedulaProfesionalEpisodio;
    }

    public function getNombreMedicoEpisodio() {
        return $this->nombreMedicoEpisodio;
    }

    public function setNombreMedicoEpisodio(string $nombreMedicoEpisodio) {
        $this->nombreMedicoEpisodio = $nombreMedicoEpisodio;
    }

    public function getApellidoPaternoMedico() {
        return $this->apellidoPaternoMedico;
    }

    public function setApellidoPaternoMedico(string $apellidoPaternoMedico) {
        $this->apellidoPaternoMedico = $apellidoPaternoMedico;
    }

    public function getApellidoMaternoMedico() {
        return $this->apellidoMaternoMedico;
    }

    public function setApellidoMaternoMedico(string $apellidoMaternoMedico) {
        $this->apellidoMaternoMedico = $apellidoMaternoMedico;
    }

    public function getLicenciaEpisodio() {
        return $this->licenciaEpisodio;
    }

    public function setLicenciaEpisodio(string $licenciaEpisodio) {
        $this->licenciaEpisodio = $licenciaEpisodio;
    }

    public function getNombreEstablecimiento() {
        return $this->nombreEstablecimiento;
    }

    public function setNombreEstablecimiento(string $nombreEstablecimiento) {
        $this->nombreEstablecimiento = $nombreEstablecimiento;
    }

    public function getTelefonoEstablecimiento() {
        return $this->telefonoEstablecimiento;
    }

    public function setTelefonoEstablecimiento(int $telefonoEstablecimiento) {
        $this->telefonoEstablecimiento = $telefonoEstablecimiento;
    }

    public function getCorreoEstablecimeinto() {
        return $this->correoEstablecimiento;
    }

    public function setCorreoEstablecimiento(string $correoEstablecimiento) {
        $this->correoEstablecimiento = $correoEstablecimiento;
    }

    public function getDomicilioEstablecimiento() {
        return $this->domicilioEstablecimiento;
    }

    public function setDomicilioEstablecimiento(string $domicilioEstablecimiento) {
        $this->domicilioEstablecimiento = $domicilioEstablecimiento;
    }

    public function getNombreVialidadEpisodio() {
        return $this->nombreVialidadEpisodio;
    }

    public function setNombreVialidadEpisodio(string $nombreVialidadEpisodio) {
        $this->nombreVialidadEpisodio = $nombreVialidadEpisodio;
    }

    public function getNumeroExteriorEstablecimiento() {
        return $this->numeroExteriorEstablecimiento;
    }

    public function setNumeroExteriorEstablecimiento(float $numeroExteriorEstablecimiento) {
        $this->numeroExteriorEstablecimiento = $numeroExteriorEstablecimiento;
    }

    public function getAlfanumericoExterior() {
        return $this->alfanumericoExterior;
    }

    public function setAlfanumericoExterior(string $alfanumericoExterior) {
        $this->alfanumericoExterior = $alfanumericoExterior;
    }

    public function getNumeroInteriorEstablecimiento() {
        return $this->numeroInteriorEstablecimiento;
    }

    public function setNumeroInteriorEstablecimiento(float $numeroInteriorEstablecimiento) {
        $this->numeroInteriorEstablecimiento = $numeroInteriorEstablecimiento;
    }

    public function getAlfanumericoInterior() {
        return $this->alfanumericoInterior;
    }

    public function setAlfanumericoInterior(string $alfanumericoInterior) {
        $this->alfanumericoInterior = $alfanumericoInterior;
    }

    public function getAsentamientoDomicilio() {
        return $this->asentamientoDomicilio;
    }

    public function setAsentamientoDomicilio(string $asentamientoDomicilio) {
        $this->asentamientoDomicilio = $asentamientoDomicilio;
    }

    public function getPaisEpisodio() {
        return $this->paisEpisodio;
    }

    public function setPaisEpisodio(string $paisEpisodio) {
        $this->paisEpisodio = $paisEpisodio;
    }

    public function getTipoEpisodio() {
        return $this->tipoEpisodio;
    }

    public function setTipoEpisodio(TipoEpisodio $tipoEpisodio) {
        $this->tipoEpisodio = $tipoEpisodio;
    }

    public function getClues() {
        return $this->clues;
    }

    public function setClues(CLUES $clues) {
        $this->clues = $clues;
    }

    public function getTipoVialidad() {
        return $this->tipoVialidad;
    }

    public function setTipoVialidad(TipoVialidad $tipoVialidad) {
        $this->tipoVialidad = $tipoVialidad;
    }

    public function getTipoAsentamiento() {
        return $this->tipoAsentamiento;
    }

    public function setTipoAsentamiento(TipoAsentamiento $tipoAsentamiento) {
        $this->tipoAsentamiento = $tipoAsentamiento;
    }
}
