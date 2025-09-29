<?php
// CalculadoraTest.php

use PHPUnit\Framework\TestCase;

// Asumiendo que la clase Calculadora está en el mismo namespace o cargada con autoload
// Si está en otro namespace, ajusta el use correspondiente o incluye el archivo

class CalculadoraTest extends TestCase {
    public function testSumar()
    {
        $cal = new Calculadora();
        $this->assertEquals(6, $cal->sumar(2, 4), "2+4 debe dar 6");
        $this->assertEquals(0, $cal->sumar(-1, 1), "-1+1 debe dar 0");
        $this->assertEquals(-3, $cal->sumar(-1, -2), "-1 + -2 debe dar -3");
    }

    public function testRestar()
    {
        $cal = new Calculadora();
        $this->assertEquals(2, $cal->restar(5, 3), "5-3 debe dar 2");
        $this->assertEquals(-4, $cal->restar(1, 5), "1-5 debe dar -4");
    }

    public function testMultiplicar()
    {
        $cal = new Calculadora();
        $this->assertEquals(15, $cal->multiplicar(3, 5), "3*5 debe dar 15");
        $this->assertEquals(0, $cal->multiplicar(0, 5), "0*5 debe dar 0");
    }

    public function testDividir()
    {
        $cal = new Calculadora();
        $this->assertEquals(2, $cal->dividir(10, 5), "10/5 debe dar 2");

        // También podemos probar división por cero, esperando excepción
        $this->expectException(DivisionByZeroError::class);
        $cal->dividir(5, 0);
    }
}
?>
