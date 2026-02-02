# 📘 Guía Completa – Examen Práctico DWES (Acceso a Datos)

Este documento resume **todo lo que puede salir en el examen práctico** siguiendo la estructura real del proyecto proporcionado. Está pensado para **repasar rápido antes del examen** y como **plantilla mental** mientras programas.

---

## 📂 Estructura del Proyecto (Tipo Examen)

```
examenAlvaroBD/
│
├── public/
│   ├── index.php
│   ├── resultado.php
│   ├── volver.php
│   └── uploads/
│
├── app/
│   ├── database/
│   │   ├── config.php
│   │   ├── database.php
│   │   ├── aprendices.sql
│   │   └── aprendices.db
│   │
│   ├── models/
│   │   └── Aprendiz.php
│   │
│   ├── controllers/
│   │   └── aprendizcontrollers.php
│   │
│   └── views/
│       └── form.php
│
├── validaciones.php
└── readme.md
```

👉 Esto sigue un **patrón MVC simplificado**:
- **Modelo** → Base de datos y SQL
- **Vista** → HTML / formularios
- **Controlador** → Lógica y flujo

---

## 🔌 1. Conexión a Base de Datos (PDO)

### ❓ ¿Qué hace esta parte?
Se encarga de **conectarse a la base de datos** usando PDO. Es el primer paso obligatorio para poder hacer cualquier operación (SELECT, INSERT, UPDATE, DELETE).

### 🧪 Posible pregunta de examen
> Completa la conexión a la base de datos utilizando PDO y control de errores.

### ✅ Solución esperada

📍 `app/database/config.php`
```php
define('DB_DSN', 'sqlite:' . __DIR__ . '/aprendices.db');
define('DB_USER', null);
define('DB_PASS', null);
```

📍 `app/database/database.php`
```php
<?php
require_once "config.php";

class Database {
    public static function conectar() {
        try {
            $conexion = new PDO(DB_DSN, DB_USER, DB_PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error de conexión");
        }
    }
}
```

✔ Uso de PDO
✔ try/catch
✔ Método reutilizable

---

## 🧱 2. Modelo (SQL SIEMPRE AQUÍ)

### ❓ ¿Qué hace esta parte?
El **modelo** se encarga de **hablar con la base de datos**. Aquí van todas las consultas SQL. Nunca se escribe SQL en el controlador.

### 🧪 Posible pregunta de examen
> Crea un método que inserte un aprendiz en la base de datos y otro que los muestre todos.

### ✅ Solución esperada

📍 `app/models/Aprendiz.php`
```php
<?php
require_once __DIR__ . '/../database/database.php';

class Aprendiz {

    public static function insertar($nombre, $edad, $email) {
        $db = Database::conectar();
        $sql = $db->prepare(
            "INSERT INTO aprendices (nombre, edad, email) VALUES (?, ?, ?)"
        );
        return $sql->execute([$nombre, $edad, $email]);
    }

    public static function obtenerTodos() {
        $db = Database::conectar();
        $sql = $db->query("SELECT * FROM aprendices");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
```

📌 Regla de examen: **si hay SQL → va en el modelo**.

---

## 🎮 3. Controlador (Procesa el formulario)

### ❓ ¿Qué hace esta parte?
El **controlador** recoge los datos del formulario, llama al modelo y decide qué página se muestra después.

### 🧪 Posible pregunta de examen
> Procesa los datos enviados por un formulario y guárdalos en la base de datos.

### ✅ Solución esperada

📍 `app/controllers/aprendizcontrollers.php`
```php
<?php
require_once __DIR__ . '/../models/Aprendiz.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $edad   = $_POST['edad'];
    $email  = $_POST['email'];

    Aprendiz::insertar($nombre, $edad, $email);

    header('Location: ../../public/resultado.php');
    exit;
}
```

✔ No hay SQL aquí
✔ Usa el modelo
✔ Redirección correcta

---

## 🖼️ 4. Vista (Formulario)

### ❓ ¿Qué hace esta parte?
La **vista** muestra el formulario al usuario. Solo contiene HTML (y como mucho algo de PHP para mostrar datos).

### 🧪 Posible pregunta de examen
> Crea un formulario que envíe los datos al controlador usando POST.

### ✅ Solución esperada

📍 `app/views/form.php`
```html
<form action="../controllers/aprendizcontrollers.php" method="post">
    <label>Nombre</label>
    <input type="text" name="nombre" required>

    <label>Edad</label>
    <input type="number" name="edad" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <button type="submit">Guardar</button>
</form>
```

---

## 📋 5. Mostrar Resultados

### ❓ ¿Qué hace esta parte?
Muestra los datos guardados en la base de datos llamando a un método del modelo.

### 🧪 Posible pregunta de examen
> Muestra todos los registros almacenados en la tabla aprendices.

### ✅ Solución esperada

📍 `public/resultado.php`
```php
<?php
require_once '../app/models/Aprendiz.php';

$aprendices = Aprendiz::obtenerTodos();

foreach ($aprendices as $a) {
    echo $a['nombre'] . ' - ' . $a['email'] . '<br>';
}
```

---

## ✅ 6. Validaciones

### ❓ ¿Qué hace esta parte?
Comprueba que los datos introducidos por el usuario sean correctos antes de guardarlos.

### 🧪 Posible pregunta de examen
> Valida que el nombre no esté vacío y que el email tenga un formato correcto.

### ✅ Solución esperada

📍 `validaciones.php`
```php
<?php
function validarNombre($nombre) {
    return !empty(trim($nombre));
}

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
```

---

## 📤 7. Subida de Archivos (Típico extra)

### ❓ ¿Qué hace esta parte?
Permite guardar un archivo enviado por el usuario en el servidor.

### 🧪 Posible pregunta de examen
> Guarda una imagen subida por el usuario en la carpeta uploads.

### ✅ Solución esperada

📍 `public/uploads/`
```php
if (isset($_FILES['foto'])) {
    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        'uploads/' . $_FILES['foto']['name']
    );
}
```

---

## ❌ Errores que bajan nota

- No usar PDO
- Meter SQL en el controlador
- No usar consultas preparadas
- No usar try/catch
- No respetar MVC

---

## 🧠 Chuleta Mental para el Examen

- **Modelo** → SQL
- **Controlador** → Lógica
- **Vista** → HTML

Si sigues esto, **apruebas seguro**.

---

## 🎯 Consejo Final

Ante la duda:
> **Consulta preparada SIEMPRE**

Suma puntos incluso si no lo piden explícitamente.

---

💪 ¡Guárdate este README en VS Code y úsalo como guía rápida antes del examen!

