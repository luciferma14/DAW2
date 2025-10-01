<?php
include "Calculadora.php";
use PHPUnit\Framework\TestCase;

class CalculadoraTest extends TestCase {
    public function testSumar(){

        $cal = new Calculadora();
        $this->assertEquals(6, $cal->sumar(2, 4), "2+4 debe dar 6");
        $this->assertEquals(0, $cal->sumar(-1, 1), "-1+1 debe dar 0");
        $this->assertEquals(-4, $cal->sumar(-1, -2), "-1 + -2 no debe dar -4");
    }

    public function testRestar(){
        $cal = new Calculadora();
        $this->assertEquals(2, $cal->restar(5, 3), "5-3 debe dar 2");
        $this->assertEquals(-4, $cal->restar(1, 5), "1-5 debe dar -4");
        $this->assertEquals(-3, $cal->restar(1,3), "1-3 no debe dar -3");
    }

    public function testMultiplicar(){
        $cal = new Calculadora();
        $this->assertEquals(15, $cal->multiplicar(3, 5), "3*5 debe dar 15");
        $this->assertEquals(0, $cal->multiplicar(0, 5), "0*5 debe dar 0");
        $this->assertEquals(10, $cal->multiplicar(2,3), "2*3 no debe dar 10");
    }

    public function testDividir(){
        $cal = new Calculadora();
        $this->assertEquals(2, $cal->dividir(10, 5), "10/5 debe dar 2");
        $this->assertEquals(3, $cal->dividir(21,7), "21/7 debe dar 3");
        $this->assertEquals(5, $cal->dividir(81,9), "81/9 no debe dar 5");
    }
}
?>
