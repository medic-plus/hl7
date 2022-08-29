<?php

namespace Medicplus\HL7;

use Medicplus\HL7\Segments\Alergias;
use Medicplus\HL7\Segments\AntecedentesHeredofamiliares;
use Medicplus\HL7\Segments\AntecedentesNoPatologicos;
use Medicplus\HL7\Segments\AntecedentesPatologicos;
use Medicplus\HL7\Segments\DatosDestinarios;
use Medicplus\HL7\Segments\Diagnosticos;
use Medicplus\HL7\Segments\Discapacidades;
use Medicplus\HL7\Segments\Evolucion;
use Medicplus\HL7\Segments\ImpresionDiagnostica;
use Medicplus\HL7\Segments\Medicamentos;
use Medicplus\HL7\Segments\MedicamentosAdministrados;
use Medicplus\HL7\Segments\MotivoReferencia;
use Medicplus\HL7\Segments\PlanTratamiento;
use Medicplus\HL7\Segments\Procedimientos;
use Medicplus\HL7\Segments\PronosticosSalud;
use Medicplus\HL7\Segments\ResultadosEstudios;
use Medicplus\HL7\Segments\SignosVitales;
use Medicplus\HL7\Segments\Sintomatologia;

/**
 * Documento HL7
 *
 * @author  Ivan Vasquez  <ivanvasquezp@outlook.com>
 * @author  Omar Acuña
 */
class Documento {

    private array $alergias = [];
    private array $antecedentesHeredofamiliares = [];
    private array $antecedentesPersonales = [];
    private array $antecedentesPatologicos = [];
    private array $datosDestinarios = [];
    private array $diagnosticos = [];
    private array $discapacidades = [];
    private array $evolucionPaciente = [];
    private array $impresionDiagnostica = [];
    private array $manifestacionIniciales = [];
    private array $medicamentos = [];
    private array $medicamentoAdministrado = [];
    private array $motivoReferencia = [];
    private array $planTratamientoTerapeuticas = [];
    private array $procedimientos = [];
    private array $pronosticoSalud = [];
    private array $ResultadosEstudios = [];
    private array $signosVitales = [];


    public function addAlergia(Alergias $alergia) {
        array_push($this->alergias, $alergia);
    }

    public function getAlergias() {
        return $this->alergias;
    }

    public function setAlergias(array $alergias) {
        $this->alergias = $alergias;
    }

    public function addAntecedenteHeredofamilia(AntecedentesHeredofamiliares $antecedente) {
        array_push($this->antecedentesHeredofamiliares, $antecedente);
    }

    public function getAntecedentesHeredofamiliares() {
        return $this->antecedentesHeredofamiliares;
    }

    public function setAntecedentesHeredofamiliares(array $antecedentes) {
        $this->antecedentesHeredofamiliares = $antecedentes;
    }

    public function addAntecedentesPersonal(AntecedentesNoPatologicos $antecedentesPersonal) {
        array_push($this->antecedentesPersonales, $antecedentesPersonal);
    }

    public function getAntecedentesPersonales() {
        return $this->antecedentesPersonales;
    }

    public function setAntecedentesPersonales(array $antecedentesPersonales) {
        $this->antecedentesPersonales = $antecedentesPersonales;
    }

    public function addAntecedentePatologico(AntecedentesPatologicos $antecedentePatologico) {
        array_push($this->antecedentesPatologicos, $antecedentePatologico);
    }

    public function getAntecedentesPatologicos() {
        return $this->antecedentesPatologicos;
    }

    public function setAntecedentesPatologicos(array $antecedentesPatolo) {
        $this->antecedentesPatologicos = $antecedentesPatolo;
    }

    public function addDatosDestinarios(DatosDestinarios $datoDestinario) {
        array_push($this->datosDestinarios, $datoDestinario);
    }

    public function getDatosDestinarios() {
        return $this->datosDestinarios;
    }

    public function setDatosDestinarios(array $datosDestinarios) {
        $this->datosDestinarios = $datosDestinarios;
    }

    public function addDiagnosticos(Diagnosticos $diagnostico) {
        array_push($this->diagnosticos, $diagnostico);
    }

    public function getDiagnosticos() {
        return $this->diagnosticos;
    }

    public function setDiagnosticos(array $diagnosticos) {
        $this->diagnosticos = $diagnosticos;
    }

    public function addDiscapacidades(Discapacidades $discapacidad) {
        array_push($this->discapacidades, $discapacidad);
    }

    public function getDiscapacidades() {
        return $this->discapacidades;
    }

    public function setDiscapacidades(array $discapacidades) {
        $this->discapacidades = $discapacidades;
    }

    public function addEvolucionPaciente(Evolucion $evolucionesPaciente) {
        array_push($this->evolucionPaciente, $evolucionesPaciente);
    }

    public function getEvolucionPaciente() {
        return $this->evolucionPaciente;
    }

    public function setEvolucionPaciente(array $evolucionPaciente) {
        $this->evolucionPaciente = $evolucionPaciente;
    }

    public function addImpresionDiagnostica(ImpresionDiagnostica $impresionesDiagnosticas) {
        array_push($this->impresionDiagnostica, $impresionesDiagnosticas);
    }

    public function getImpresionDiagnostica() {
        return $this->impresionDiagnostica;
    }

    public function setImpresionDiagnostica(array $impresionDiagnostica) {
        $this->impresionDiagnostica = $impresionDiagnostica;
    }

    public function addManifestacionInicial(Sintomatologia $manifestacionInicial) {
        array_push($this->manifestacionIniciales, $manifestacionInicial);
    }

    public function getManifestacionIniciales() {
        return $this->manifestacionIniciales;
    }

    public function setManifestacionIniciales(array $manifestacionIniciales) {
        $this->manifestacionIniciales = $manifestacionIniciales;
    }

    public function addMedicamentoPrevio(Medicamentos $medicamento) {
        array_push($this->medicamentos, $medicamento);
    }

    public function getDescripcionMedicamentosPrevios() {
        return $this->medicamentos;
    }

    public function setDescripcionMedicamentosPrevios(array $medicamentos) {
        $this->medicamentos = $medicamentos;
    }

    public function addMedicamentoAdministrativo(MedicamentosAdministrados $medicamentoAdmin) {
        array_push($this->medicamentoAdministrado, $medicamentoAdmin);
    }

    public function getMedicamentoAdministrado() {
        return $this->medicamentoAdministrado;
    }

    public function setMedicamentoAdministrado(array $medicamentoAdministrado) {
        $this->medicamentoAdministrado = $medicamentoAdministrado;
    }

    public function addMotivoRerefencia(MotivoReferencia $motivosReferencias) {
        array_push($this->motivoReferencia, $motivosReferencias);
    }

    public function getMotivoReferencia() {
        return $this->motivoReferencia;
    }

    public function setMotivoReferencia(array $motivoReferencia) {
        $this->motivoReferencia = $motivoReferencia;
    }

    public function addPlanTratamientoTerapeuticas(PlanTratamiento $planTratamientos) {
        array_push($this->planTratamientoTerapeuticas, $planTratamientos);
    }

    public function getPlanTratamientoTerapeuticas() {
        return $this->planTratamientoTerapeuticas;
    }

    public function setPlanTratamientoTerapeuticas(array $planTratamientoTerapeuticas) {
        $this->planTratamientoTerapeuticas = $planTratamientoTerapeuticas;
    }

    public function addProcedimientos(Procedimientos $procedimiento) {
        array_push($this->procedimientos, $procedimiento);
    }

    public function getProcedimiento() {
        return $this->procedimientos;
    }

    public function setProcedimiento(array $procedimientos) {
        $this->procedimientos = $procedimientos;
    }

    public function addPronosticoSalud(PronosticosSalud $pronosticosDeSalud) {
        array_push($this->pronosticoSalud, $pronosticosDeSalud);
    }

    public function getPronosticoSalud() {
        return $this->pronosticoSalud;
    }

    public function setPronosticoSalud(array $pronosticoSalud) {
        $this->pronosticoSalud = $pronosticoSalud;
    }

    public function addResultadosEstudios(ResultadosEstudios $resultado) {
        array_push($this->ResultadosEstudios, $resultado);
    }

    public function getResultados() {
        return $this->ResultadosEstudios;
    }

    public function setResultados(array $resultados) {
        $this->ResultadosEstudios = $resultados;
    }

    public function addSignosVitales(SignosVitales $signoVital) {
        array_push($this->signosVitales, $signoVital);
    }

    public function getSignosVitales() {
        return $this->signosVitales;
    }

    public function setSignosVitales(array $signosVitales) {
        $this->signosVitales = $signosVitales;
    }
}