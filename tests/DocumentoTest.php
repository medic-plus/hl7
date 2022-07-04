<?php

namespace Medicplus\HL7\Tests;

use Medicplus\HL7\Segments\Alergias;
use Medicplus\HL7\Config;
use Medicplus\HL7\Documento;
use Medicplus\HL7\DocumentParser;

/**
 * Class SampleTest
 *
 * @category Test
 * @package  Medicplus\HL7\Tests
 * @author   Ivan Vasquez <ivanvasquezp@outlook.com>
 */
class DocumentoTest extends TestCase {

    static function exportDOM(?Documento $documento) {
        $config = new Config();
        $parser = new DocumentParser($config, $documento);
        return $parser->toXML();
    }

    public function testEmptyXML() {
        $documento = DocumentoTest::exportDOM(null);
        $expected = file_get_contents('./tests/files/empty.xml');
        $this->assertEquals($expected, $documento);
    }

    public function testAlergias() {
        $documento = new Documento();
        $alergia1 = new Alergias("Alergia prueba 1");
        $alergia2 = new Alergias("Alergia prueba 2");
        $documento->addAlergia($alergia1);
        $documento->addAlergia($alergia2);
        $expected = file_get_contents('./tests/files/segments/alergias.xml');
        $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    }
}