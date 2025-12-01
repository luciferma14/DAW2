

## 1) Cargar datos en el formulario con una variable (prefill)
<details>
<summary>Ver ejemplo</summary>

```php
<?php
// supongamos que $name viene de BD, cookie, o $_POST anterior
$name = $stored_data[0]['name'] ?? 'Juan Pérez';
?>
<input type="text" name="nombre" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>">
```

</details>

---

## 2) Crear cookies y sus valores (creación y lectura)
<details>
<summary>Ver ejemplo</summary>

```php
<?php
// clásica (antes de cualquier salida)
setcookie('usuario', 'CorsoCoder', time()+3600, '/'); // 1 hora

// con opciones (PHP 7.3+)
setcookie('token', 'abc123', [
  'expires' => time()+3600,
  'path' => '/',
  'secure' => true,
  'httponly' => true,
  'samesite' => 'Lax'
]);

// leer cookie
if (isset($_COOKIE['usuario'])) {
  $u = $_COOKIE['usuario'];
}
?>
```

Nota: setcookie() debe llamarse antes de cualquier salida HTML. Las cookies tienen límite de tamaño (~4 KB) y no deben contener datos sensibles sin protección.

</details>

---

## 3) Recorrer arrays (foreach y for)
<details>
<summary>Ver ejemplo</summary>

```php
<?php
$frutas = ['manzana','platano','pera'];

// foreach
foreach ($frutas as $i => $f) {
  echo "$i => " . htmlspecialchars($f) . "<br>";
}

// for
for ($i = 0; $i < count($frutas); $i++) {
  echo $frutas[$i] . "<br>";
}

// array asociativo
$persona = ['name'=>'Ana','email'=>'a@x.com'];
foreach ($persona as $k => $v) {
  echo "$k: " . htmlspecialchars($v) . "<br>";
}
?>
```

</details>

---

## 4) Obtener una variable de un input multiselect (HTML y PHP)
<details>
<summary>Ver ejemplo</summary>

HTML:
```html
<form method="POST">
  <select name="frutas[]" multiple>
    <option value="manzana">Manzana</option>
    <option value="pera">Pera</option>
    <option value="uva">Uva</option>
  </select>
  <button>Enviar</button>
</form>
```

PHP:
```php
<?php
$seleccionadas = $_POST['frutas'] ?? []; // array
if (!empty($seleccionadas)) {
  foreach ($seleccionadas as $f) {
    echo htmlspecialchars($f) . "<br>";
  }
}
?>
```

Preseleccionar opción en la carga:
```php
<option value="uva" <?= in_array('uva', $seleccionadas ?? []) ? 'selected' : '' ?>>Uva</option>
```

</details>

---

## 5) Enviar datos a otra página con una session
<details>
<summary>Ver ejemplo</summary>

page1.php:
```php
<?php
session_start();
$_SESSION['usuario'] = 'CorsoCoder';
header('Location: page2.php');
exit;
```

page2.php:
```php
<?php
session_start();
echo 'Usuario: ' . ($_SESSION['usuario'] ?? 'no hay');
```

</details>

---

## 6) Enviar datos a otra página con una cookie
<details>
<summary>Ver ejemplo</summary>

page1.php:
```php
<?php
setcookie('usuario', 'CorsoCoder', time()+3600, '/');
header('Location: page2.php');
exit;
```

page2.php:
```php
<?php
echo 'Usuario (cookie): ' . ($_COOKIE['usuario'] ?? 'no hay');
```

Recuerda: la cookie estará disponible en la siguiente petición (page2). Para ver el valor inmediatamente en la misma petición usa la variable local donde tengas el valor (o redirige).

</details>

---

## 7) Ejemplo completo: historial de envíos guardado en cookie (versión compacta y segura)
<details>
<summary>Ver ejemplo</summary>

```php
<?php
// form_history_cookie.php
// Guarda los envíos en la cookie "data" (JSON) y muestra historial.
// Límite de registros: 10

$cookie_name = 'data';
$max_records = 10;
$cookie_expires = time() + 30*24*60*60; // 30 días

// cargar existente
$stored_data = [];
if (!empty($_COOKIE[$cookie_name])) {
    $tmp = json_decode($_COOKIE[$cookie_name], true);
    if (is_array($tmp)) $stored_data = $tmp;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $color = $_POST['color'] ?? '';
    $drink = $_POST['bebida'] ?? '';

    // validación simple
    if ($name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $new = [
            'name' => $name,
            'email' => $email,
            'color' => $color,
            'drink' => $drink,
            't' => date('c')
        ];

        array_unshift($stored_data, $new); // añadir al inicio (más reciente primero)

        // mantener máximo $max_records
        $stored_data = array_slice($stored_data, 0, $max_records);

        // guardar cookie (antes de salida)
        setcookie($cookie_name, json_encode($stored_data), [
          'expires' => $cookie_expires,
          'path' => '/',
          'httponly' => false,
          'samesite' => 'Lax'
        ]);

        // redirigir para evitar reenvío de formulario (PRG)
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = 'Datos inválidos';
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Historial en cookie</title></head>
<body>
<?php if (!empty($error)) echo '<p style="color:red">'.htmlspecialchars($error).'</p>'; ?>

<form method="POST">
  <input name="nombre" required placeholder="Nombre"><br>
  <input name="email" type="email" required placeholder="Email"><br>
  <input name="color" type="color" value="#000000"><br>
  <select name="bebida">
    <option value="agua">Agua</option>
    <option value="cafe">Café</option>
    <option value="te">Té</option>
  </select><br>
  <button>Enviar</button>
</form>

<h3>Historial (últimos <?= $max_records ?>)</h3>
<?php if (empty($stored_data)): ?>
  <p>No hay registros.</p>
<?php else: ?>
  <?php foreach ($stored_data as $i => $r): ?>
    <div>
      <strong>#<?= $i+1 ?></strong><br>
      <?= htmlspecialchars($r['name']) ?> — <?= htmlspecialchars($r['email']) ?><br>
      Color: <span style="display:inline-block;width:18px;height:18px;background:<?= htmlspecialchars($r['color']) ?>;vertical-align:middle;border:1px solid #000"></span>
      — <?= htmlspecialchars($r['drink']) ?><br>
      <small><?= htmlspecialchars($r['t']) ?></small>
    </div>
    <hr>
  <?php endforeach; ?>
<?php endif; ?>
</body>
</html>
```

</details>

---

## 8) Manejar la subida de fotos a una cookie
<details>
<summary>Ver ejemplo y consideraciones</summary>

Importante: las cookies tienen límite de tamaño (~4KB). Guardar fotos en cookies solo es viable para imágenes pequeñísimas (thumbnails muy pequeños) y no es recomendable. Si aún así quieres un ejemplo técnico, convierte la imagen a base64, reduce su tamaño y guarda la cadena en la cookie (con riesgo de exceder el límite).

```php
<?php
// subida_base64_cookie.php (ejemplo didáctico — NO recomendado para producción)
$cookie_name = 'img';
$cookie_expires = time() + 7*24*3600; // 7 días

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['foto']['tmp_name'])) {
    $tmp = $_FILES['foto']['tmp_name'];
    $info = getimagesize($tmp);

    // validar tipo
    if ($info && in_array($info['mime'], ['image/jpeg','image/png','image/gif'])) {
        // Opcional: reescalar la imagen aquí para reducir tamaño (usando GD o Imagick)
        $data = file_get_contents($tmp);
        $b64 = base64_encode($data);

        // Atención al tamaño: si strlen($b64) > 3800 probablemente no quepa en cookie.
        if (strlen($b64) < 3800) {
            setcookie($cookie_name, $b64, $cookie_expires, '/');
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $error = "Imagen demasiado grande para guardar en cookie.";
        }
    } else {
        $error = "Formato no válido.";
    }
}

// Mostrar imagen desde cookie
if (!empty($_COOKIE[$cookie_name])) {
    $b64 = $_COOKIE[$cookie_name];
    echo '<img src="data:image/*;base64,' . htmlspecialchars($b64) . '" alt="foto">';
}
?>
<form method="POST" enctype="multipart/form-data">
  <input type="file" name="foto" accept="image/*" required>
  <button>Subir</button>
</form>
```

Recomendación: usar almacenamiento en servidor (filesystem) o sesiones/BD en lugar de cookies.

</details>

---

## 9) Manejar la subida de fotos mediante session
<details>
<summary>Ver ejemplo seguro y práctico</summary>

Ejemplo que mueve la foto a un directorio uploads/ y guarda la ruta en la sesión:

```php
<?php
session_start();

// Asegúrate de que uploads/ exista y sea escribible
$uploadDir = __DIR__ . '/uploads';
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['foto']['tmp_name'])) {
    $tmp = $_FILES['foto']['tmp_name'];
    $name = basename($_FILES['foto']['name']);
    $info = getimagesize($tmp);

    if ($info && in_array($info['mime'], ['image/jpeg','image/png','image/gif'])) {
        // Generar nombre seguro
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $target = $uploadDir . '/' . uniqid('img_') . '.' . $ext;

        if (move_uploaded_file($tmp, $target)) {
            // Guardar ruta relativa en la sesión
            $_SESSION['photos'][] = 'uploads/' . basename($target);
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $error = 'Error al mover el archivo.';
        }
    } else {
        $error = 'Formato no válido.';
    }
}
?>
<?php if (!empty($error)) echo '<p style="color:red">'.htmlspecialchars($error).'</p>'; ?>
<form method="POST" enctype="multipart/form-data">
  <input type="file" name="foto" accept="image/*" required>
  <button>Subir</button>
</form>

<h3>Fotos subidas (sesión)</h3>
<?php
foreach ($_SESSION['photos'] ?? [] as $p) {
    echo '<img src="' . htmlspecialchars($p) . '" style="max-width:150px;margin:5px">';
}
?>
```

Ventajas: la sesión guarda información en el servidor (seguro), y los archivos están en disco (no limitados por 4KB).

</details>

---

## 10) Funciones genéricas para validar entradas tipo string y num
<details>
<summary>Ver funciones de ejemplo</summary>

```php
<?php
function sanitize_string(string $s): string {
    // trim + eliminar control chars
    return filter_var(trim($s), FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW);
}

function validate_string(string $s, int $min = 1, int $max = 255): bool {
    $len = mb_strlen($s);
    return ($len >= $min && $len <= $max);
}

function validate_int($v, int $min = null, int $max = null): bool {
    if (filter_var($v, FILTER_VALIDATE_INT) === false) return false;
    $int = (int)$v;
    if (!is_null($min) && $int < $min) return false;
    if (!is_null($max) && $int > $max) return false;
    return true;
}

// Uso
$name = sanitize_string($_POST['nombre'] ?? '');
if (!validate_string($name, 2, 100)) { $error = "Nombre inválido"; }

$age = $_POST['edad'] ?? null;
if (!validate_int($age, 0, 120)) { $error = "Edad inválida"; }
?>
```

Estas funciones son básicas; usa validaciones más específicas según el campo (emails con FILTER_VALIDATE_EMAIL, URLs, etc.).

</details>

---

## 11) Tipos de variables y estructuras de datos en PHP (breve)
<details>
<summary>Resumen rápido</summary>

- Tipos escalares:
  - string — texto: "hola"
  - int — entero: 123
  - float/double — números con decimales: 3.14
  - bool — booleano: true/false

- Tipos compuestos:
  - array — lista indexada o asociativa:
    - indexada: ['manzana','pera']
    - asociativa: ['name' => 'Ana', 'age' => 30]
    - multidimensional: [['a'=>1], ['b'=>2]]
  - object — instancias de clases

- Otros:
  - resource — manejadores (p.ej. conexiones)
  - null — ausencia de valor

Operaciones comunes: isset(), empty(), is_array(), count(), foreach(), array_map(), array_filter().

</details>

---

## Información adicional y buenas prácticas (recomendaciones)
<details>
<summary>Ver recomendaciones</summary>

- Seguridad:
  - Nunca guardes datos sensibles sin cifrar en cookies (ej. contraseñas, tokens sin protección).
  - Usa flags de cookie: Secure, HttpOnly y SameSite.
  - Valida y sanitiza todas las entradas de usuario (XSS, inyección).
  - Para file uploads: valida MIME-type, extensión, tamaño y utiliza nombres únicos; no confíes en el nombre del cliente.
  - Implementa CSRF tokens en formularios cuando uses sesiones.

- Persistencia:
  - Las cookies son limitadas (tamaño y número por dominio). Para historiales grandes usa sesión, BD o archivos.
  - Las sesiones almacenan datos en servidor (más seguros) pero dependen de la configuración del servidor.

- Experiencia:
  - Usa PRG (Post/Redirect/Get) para evitar resubmisión de formularios al recargar.
  - Limita el número de registros guardados en cookie y muestra un aviso si se alcanza el límite.
  - Guarda timestamps en los registros para ordenar/mostrar historial.

- Manejo de JSON:
  - Al serializar arrays en cookie con json_encode(), comprueba json_last_error() para detectar problemas.
  - Codifica/decodifica datos con json_encode/json_decode.

- Limpieza:
  - Para eliminar una cookie: setcookie('name', '', time() - 3600, '/');
  - Para destruir sesión: session_unset(); session_destroy();


</details>

```