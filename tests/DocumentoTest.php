<?php

namespace Medicplus\HL7\Tests;

use Medicplus\HL7\Segments\Alergias;
use Medicplus\HL7\Config;
use Medicplus\HL7\Documento;

/**
 * Class SampleTest
 *
 * @category Test
 * @package  Medicplus\HL7\Tests
 * @author   Ivan Vasquez <ivanvasquezp@outlook.com>
 */
class DocumentoTest extends TestCase {

    public function testEmptyXML() {
        $documento = new Documento(new Config());
        $expected = file_get_contents('./tests/files/empty.xml');
        $this->assertEquals($expected, $documento->toXML());
    }

    public function testAlergias() {
        $documento = new Documento(new Config());
        $alergia = new Alergias("Prueba");
        $documento->addAlergia($alergia);
        $expected = file_get_contents('./tests/files/segments/alergias.xml');
        $this->assertEquals($expected, $documento->toXML());
    }
}