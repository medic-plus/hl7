<?php

namespace Medicplus\HL7;

use Medicplus\HL7\Segments\Alergias;
use Medicplus\HL7\Segments\antecedente_patologicos_paciente;
use Medicplus\HL7\Segments\antecedentes_personales_no_patologicos_paciente;
use Medicplus\HL7\Segments\datos_afiliaciones_planos_aseguramiento_paciente;
use Medicplus\HL7\Segments\evolucion_paciente_atencion;
use Medicplus\HL7\Segments\impresion_diagnostico;
use Medicplus\HL7\Segments\plan_tratamiento_recomendaciones_terapeuticas;
use Medicplus\HL7\Segments\pronosticos_salud_paciente;
use Medicplus\HL7\Segments\sintomatologia_paciente;

/**
 * Documento HL7
 *
 * @author  Ivan Vasquez  <ivanvasquezp@outlook.com>
 * @author  Omar Acuña
 */
class Documento {

    private array $alergias = [];
    private array $antecedentesPatologicos = [];
    private array $manifestacionIniciales = [];
    private array $antecedentesPersonales = [];
    private array $pronosticoSalud = [];
    private array $datosAfiliaciones = [];
    private array $evolucionPaciente = [];
    private array $planTratamientoTerapeuticas = [];
    private array $impresionDiagnostica = [];

    public function addAlergia(Alergias $alergia) {
        array_push($this->alergias, $alergia);
    }

    public function getAlergias() {
        return $this->alergias;
    }

    public function setAlergias(array $alergias) {
        $this->alergias = $alergias;
    }

    public function addAntecedentesPatologicos(antecedente_patologicos_paciente $antecedentePatologico) {
        array_push($this->antecedentesPatologicos, $antecedentePatologico);
    }

    public function getAntecendentesPatologicos() {
        return $this->antecedentesPatologicos;
    }

    public function setAntecedentesPatologicos(array $antecedentesPatologicos) {
        $this->antecedentesPatologicos = $antecedentesPatologicos;
    }

    public function addManifestacionInicial(sintomatologia_paciente $manifestacionInicial) {
        array_push($this->manifestacionIniciales, $manifestacionInicial);
    }

    public function getManifestacionIniciales() {
        return $this->manifestacionIniciales;
    }

    public function setManifestacionIniciales(array $manifestacionIniciales) {
        $this->manifestacionIniciales = $manifestacionIniciales;
    }

    public function addAntecedentesPersonal(antecedentes_personales_no_patologicos_paciente $antecedentesPersonal) {
        array_push($this->antecedentesPersonales, $antecedentesPersonal);
    }

    public function getAntecedentesPersonales() {
        return $this->antecedentesPersonales;
    }

    public function setAntecedentesPersonales(array $antecedentesPersonales) {
        $this->antecedentesPersonales = $antecedentesPersonales;
    }

    public function addPronosticoSalud(pronosticos_salud_paciente $pronosticosDeSalud) {
        array_push($this->pronosticoSalud, $pronosticosDeSalud);
    }

    public function getPronosticoSalud() {
        return $this->pronosticoSalud;
    }

    public function setPronosticoSalud(array $pronosticoSalud) {
        $this->pronosticoSalud = $pronosticoSalud;
    }

    public function addDatosAfiliacion(datos_afiliaciones_planos_aseguramiento_paciente $datosAfiliacion) {
        array_push($this->datosAfiliaciones, $datosAfiliacion);
    }

    public function getDatosAfiliaciones() {
        return $this->datosAfiliaciones;
    }

    public function setDatosAfiliaciones(array $datosAfiliaciones) {
        $this->datosAfiliaciones = $datosAfiliaciones;
    }

    public function addEvolucionPaciente(evolucion_paciente_atencion $evolucionesPaciente) {
        array_push($this->evolucionPaciente, $evolucionesPaciente);
    }

    public function getEvolucionPaciente() {
        return $this->evolucionPaciente;
    }

    public function setEvolucionPaciente(array $evolucionPaciente) {
        $this->evolucionPaciente = $evolucionPaciente;
    }

    public function addPlanTratamientoTerapeuticas(plan_tratamiento_recomendaciones_terapeuticas $planTratamientos) {
        array_push($this->planTratamientoTerapeuticas, $planTratamientos);
    }

    public function getPlanTratamientoTerapeuticas() {
        return $this->planTratamientoTerapeuticas;
    }

    public function setPlanTratamientoTerapeuticas(array $planTratamientoTerapeuticas) {
        $this->planTratamientoTerapeuticas = $planTratamientoTerapeuticas;
    }

    public function addImpresionDiagnostica(impresion_diagnostico $impresionesDiagnosticas) {
        array_push($this->impresionDiagnostica, $impresionesDiagnosticas);
    }

    public function getImpresionDiagnostica() {
        return $this->impresionDiagnostica;
    }

    public function setImpresionDiagnostica(array $impresionDiagnostica) {
        $this->impresionDiagnostica = $impresionDiagnostica;
    }
}