<?php

namespace MedicPlus\HL7\Tests;

use MedicPlus\HL7;
use MedicPlus\HL7\Config;

/**
 * Class SampleTest
 *
 * @category Test
 * @package  MedicPlus\HL7\Tests
 * @author   Ivan Vasquez <ivanvasquezp@outlook.com>
 */
class SampleTest extends TestCase {

    public function testSayHello() {
        $config = new Config();
        $sample = new HL7($config);
        $name = 'MedicPlus';
        $result = $sample->sayHello($name);
        $expected = $config->get('greeting') . ' ' . $name;
        $this->assertEquals($result, $expected);
    }

    public function testHL7() {
        $config = new Config();
        $test = new HL7($config);
        return $test;
    }
}