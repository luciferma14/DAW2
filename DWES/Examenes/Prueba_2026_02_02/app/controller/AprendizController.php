<?php

class AprendizController {

    public function guardar($datosFormulario) {
        /**
         * Crear una instancia del modelo Aprendiz
         * y guardar el aprendiz en la base de datos
         */
        include_once 'Aprendiz.php';

        $aprendiz = new Aprendiz();

        $aprendiz->nombre = $datosFormulario['nombre'] ?? '';
        $aprendiz->edad = $datosFormulario['edad'] ?? '';
        $aprendiz->curso = $datosFormulario['curso'] ?? '';

        // Llamar al método guardar para almacenar los datos en la base de datos
        $aprendiz->guardar();

        return "Aprendiz guardado correctamente!";
    }
}
