<?php

namespace MedicPlus\HL7\Tests;

use PHPUnit\Framework\TestCase as PHPUnit;

/**
 * Class TestCase
 *
 * @author Ivan Vasquez <ivanvasquezp@outlook.com>
 */
class TestCase extends PHPUnit {

    public function __construct() {
        parent::__construct();
    }

    public function setUp(): void {
        parent::setUp();
    }

    public function tearDown(): void {
        parent::tearDown();
    }
}