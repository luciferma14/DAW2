<?php
/**
 * @autor Silvia Vilar
 * Ejercicio 2 UP5. Consultas
 */
include_once __DIR__ . '/db.php';
header('Content-Type: application/json; charset=UTF-8');

$db = getPDO();

// Función para generar opciones de select dinámico
function getOpciones($tabla, $campoValor, $campoMostrar = null, $orden = null) {
    global $db;
    $campoMostrar = $campoMostrar ?? $campoValor;
    $query = "SELECT DISTINCT $campoValor, $campoMostrar FROM $tabla";
    if($orden) $query .= " ORDER BY $orden";
    $stmt = $db->query($query);
    $opciones = '';
    foreach($stmt->fetchAll() as $row){
        $opciones .= "<option value='{$row[$campoValor]}'>{$row[$campoMostrar]}</option>";
    }
    return $opciones;
}

// Variables POST
$tipoConsulta = $_POST['tipoConsulta'] ?? '';
$parametro = $_POST['parametro'] ?? '';
$dni = $_POST['dni'] ?? '';
$poblacion = $_POST['poblacion'] ?? '';
$proveedor = $_POST['proveedor'] ?? '';
$producto = $_POST['producto'] ?? '';

$result = [];

switch($tipoConsulta) {
    // --- CLIENTES ---
    case 'ClientePorDni':
        $stmt = $db->prepare("SELECT * FROM CLIENTE WHERE DNI=?");
        $stmt->execute([$dni]);
        $result = $stmt->fetch();
        break;

    case 'ListadoClientes':
        $stmt = $db->query("SELECT * FROM CLIENTE ORDER BY DNI");
        $result = $stmt->fetchAll();
        break;

    case 'ClientesDadapoblacion':
    case 'ListadoClientesPorPoblacion':
        $stmt = $db->prepare("SELECT * FROM CLIENTE WHERE POBLACION=? ORDER BY POBLACION, DNI");
        $stmt->execute([$poblacion]);
        $result = $stmt->fetchAll();
        break;

    case 'NumeroClientesPorPoblacion':
        $stmt = $db->prepare("SELECT POBLACION, COUNT(*) AS numero_clientes FROM CLIENTE WHERE POBLACION=? GROUP BY POBLACION");
        $stmt->execute([$poblacion]);
        $result = $stmt->fetchAll();
        break;

    case 'ListadoClientesConCompras':
        $stmt = $db->query("SELECT DISTINCT c.* FROM CLIENTE c JOIN COMPRA co ON c.DNI=co.CLIENTE ORDER BY c.DNI");
        $result = $stmt->fetchAll();
        break;

    case 'ListadoClientesSinCompras':
        $stmt = $db->query("SELECT * FROM CLIENTE c WHERE NOT EXISTS (SELECT 1 FROM COMPRA co WHERE co.CLIENTE=c.DNI) ORDER BY c.DNI");
        $result = $stmt->fetchAll();
        break;

    case 'ListadoClientesConComprasDadaPoblacion':
        $stmt = $db->prepare("
            SELECT DISTINCT c.* FROM CLIENTE c
            JOIN COMPRA co ON c.DNI=co.CLIENTE
            WHERE c.POBLACION=? ORDER BY c.DNI
        ");
        $stmt->execute([$poblacion]);
        $result = $stmt->fetchAll();
        break;

    case 'ListadoClientesSinComprasDadaPoblacion':
        $stmt = $db->prepare("
            SELECT * FROM CLIENTE c
            WHERE c.POBLACION=? AND NOT EXISTS (SELECT 1 FROM COMPRA co WHERE co.CLIENTE=c.DNI)
            ORDER BY c.DNI
        ");
        $stmt->execute([$poblacion]);
        $result = $stmt->fetchAll();
        break;

    case 'ListadoClientesConComprasValencia':
        $stmt = $db->query("
            SELECT DISTINCT c.* FROM CLIENTE c
            JOIN COMPRA co ON c.DNI=co.CLIENTE
            WHERE c.POBLACION='Valencia' ORDER BY c.DNI
        ");
        $result = $stmt->fetchAll();
        break;

    case 'ListadoClientesConTresOMasCompras':
        $stmt = $db->query("
            SELECT c.*, COUNT(co.CLIENTE) AS compras
            FROM CLIENTE c
            JOIN COMPRA co ON c.DNI=co.CLIENTE
            GROUP BY c.DNI
            HAVING compras >= 3
            ORDER BY c.DNI
        ");
        $result = $stmt->fetchAll();
        break;

    case 'ListadoClientesConTresComprasOMasPorPoblacion':
        $stmt = $db->prepare("
            SELECT c.*, COUNT(co.CLIENTE) AS compras
            FROM CLIENTE c
            JOIN COMPRA co ON c.DNI=co.CLIENTE
            WHERE c.POBLACION=?
            GROUP BY c.DNI
            HAVING compras >= 3
            ORDER BY c.DNI
        ");
        $stmt->execute([$poblacion]);
        $result = $stmt->fetchAll();
        break;

    // --- PROVEEDORES ---
    case 'ProveedorPorNif':
        $stmt = $db->prepare("SELECT * FROM PROVEEDOR WHERE NIF=?");
        $stmt->execute([$proveedor]);
        $result = $stmt->fetch();
        break;

    case 'ListadoProveedores':
        $stmt = $db->query("SELECT * FROM PROVEEDOR ORDER BY NIF");
        $result = $stmt->fetchAll();
        break;

    case 'ProveedoresEmpiezanPorTexto':
        $stmt = $db->prepare("SELECT * FROM PROVEEDOR WHERE NOMBRE LIKE ? ORDER BY NIF");
        $stmt->execute([$parametro.'%']);
        $result = $stmt->fetchAll();
        break;

    case 'ProveedoresProductosPvpMayor1000':
        $stmt = $db->query("
            SELECT DISTINCT pr.* FROM PROVEEDOR pr
            JOIN PRODUCTO p ON p.PROVEEDOR=pr.NIF
            WHERE p.PVP>1000 ORDER BY pr.NIF
        ");
        $result = $stmt->fetchAll();
        break;

    // --- PRODUCTOS ---
    case 'ProductoPorCodProd':
        $stmt = $db->prepare("SELECT * FROM PRODUCTO WHERE COD_PROD=?");
        $stmt->execute([$producto]);
        $result = $stmt->fetch();
        break;

    case 'ListadoProductos':
        $stmt = $db->query("SELECT * FROM PRODUCTO ORDER BY COD_PROD");
        $result = $stmt->fetchAll();
        break;

    case 'ProductosPvpMenorOIgual100':
        $stmt = $db->query("SELECT * FROM PRODUCTO WHERE PVP <= 100 ORDER BY COD_PROD");
        $result = $stmt->fetchAll();
        break;

    case 'ProductosPVPMayorPromedio':
        $stmt = $db->query("
            SELECT * FROM PRODUCTO WHERE PVP > (SELECT AVG(PVP) FROM PRODUCTO) ORDER BY COD_PROD
        ");
        $result = $stmt->fetchAll();
        break;

    case 'PvpMaximoProductos':
        $stmt = $db->query("SELECT MAX(PVP) AS max_pvp FROM PRODUCTO");
        $result = $stmt->fetch();
        break;

    case 'PvpMinimoProductos':
        $stmt = $db->query("SELECT MIN(PVP) AS min_pvp FROM PRODUCTO");
        $result = $stmt->fetch();
        break;

    case 'PvpPromedioProductos':
        $stmt = $db->query("SELECT AVG(PVP) AS avg_pvp FROM PRODUCTO");
        $result = $stmt->fetch();
        break;

    case 'ProductosNombreContieneTexto':
        $stmt = $db->prepare("SELECT * FROM PRODUCTO WHERE NOMBRE LIKE ? ORDER BY COD_PROD");
        $stmt->execute(['%'.$parametro.'%']);
        $result = $stmt->fetchAll();
        break;

    // --- COMPRAS ---
    case 'ListadoCompras':
        $stmt = $db->query("
            SELECT c.NOMBRE AS nombre_cliente, c.APELLIDOS AS apellidos_cliente,
                   p.COD_PROD, p.NOMBRE AS producto, pr.NOMBRE AS proveedor,
                   co.FECHA, co.UDES
            FROM COMPRA co
            JOIN CLIENTE c ON c.DNI=co.CLIENTE
            JOIN PRODUCTO p ON p.COD_PROD=co.PRODUCTO
            JOIN PROVEEDOR pr ON pr.NIF=p.PROVEEDOR
            ORDER BY c.DNI, p.COD_PROD
        ");
        $result = $stmt->fetchAll();
        break;

    case 'ComprasDeAnyo':
        $stmt = $db->prepare("
            SELECT * FROM COMPRA WHERE YEAR(FECHA)>=? ORDER BY FECHA
        ");
        $stmt->execute([$parametro]);
        $result = $stmt->fetchAll();
        break;

    case 'ComprasDeCliente':
        $stmt = $db->prepare("
            SELECT * FROM COMPRA WHERE CLIENTE=? ORDER BY CLIENTE
        ");
        $stmt->execute([$dni]);
        $result = $stmt->fetchAll();
        break;

    case 'ComprasDeProducto':
        $stmt = $db->prepare("SELECT * FROM COMPRA WHERE PRODUCTO=? ORDER BY PRODUCTO");
        $stmt->execute([$producto]);
        $result = $stmt->fetchAll();
        break;

    case 'ComprasDeProveedor':
        $stmt = $db->prepare("
            SELECT co.*, c.NOMBRE AS nombre_cliente, p.NOMBRE AS producto
            FROM COMPRA co
            JOIN PRODUCTO p ON p.COD_PROD=co.PRODUCTO
            JOIN CLIENTE c ON c.DNI=co.CLIENTE
            WHERE p.PROVEEDOR=?
            ORDER BY p.NOMBRE
        ");
        $stmt->execute([$proveedor]);
        $result = $stmt->fetchAll();
        break;

    case 'ComprasDePoblacion':
        $stmt = $db->prepare("
            SELECT co.*, c.NOMBRE AS nombre_cliente
            FROM COMPRA co
            JOIN CLIENTE c ON c.DNI=co.CLIENTE
            WHERE c.POBLACION=?
            ORDER BY c.POBLACION
        ");
        $stmt->execute([$poblacion]);
        $result = $stmt->fetchAll();
        break;

    case 'ComprasDeClientesValencia':
        $stmt = $db->query("
            SELECT co.*, c.NOMBRE AS nombre_cliente
            FROM COMPRA co
            JOIN CLIENTE c ON c.DNI=co.CLIENTE
            WHERE c.POBLACION='Valencia'
            ORDER BY c.DNI
        ");
        $result = $stmt->fetchAll();
        break;

    case 'ComprasConIgualOMasDe2Unidades':
        $stmt = $db->query("SELECT * FROM COMPRA WHERE UDES>=2 ORDER BY CLIENTE");
        $result = $stmt->fetchAll();
        break;

    case 'ComprasConMasDe3productos':
        $stmt = $db->query("
            SELECT CLIENTE, COUNT(*) AS productos_comprados
            FROM COMPRA
            GROUP BY CLIENTE
            HAVING productos_comprados>3
            ORDER BY CLIENTE
        ");
        $result = $stmt->fetchAll();
        break;

    case 'ComprasMinimo10Unidades':
        $stmt = $db->query("SELECT * FROM COMPRA WHERE UDES>=10 ORDER BY CLIENTE");
        $result = $stmt->fetchAll();
        break;

    default:
        $result = ["error"=>"Tipo de consulta no soportado"];
        break;
}

echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios Consulta</title>
</head>
<body>
    <h1>Consultas de la BD Empresa</h1>
    <form action="consultas.php" method="post">
        <label for="tipoConsulta">Tipo de consulta:</label>
        <select name="tipoConsulta" id="tipoConsulta">
            <?php
            $opciones = [
                'ClientePorDni','ListadoClientes','ClientesDadapoblacion','ListadoClientesPorPoblacion',
                'NumeroClientesPorPoblacion','ListadoClientesConCompras','ListadoClientesSinCompras',
                'ListadoClientesConComprasDadaPoblacion','ListadoClientesSinComprasDadaPoblacion',
                'ListadoClientesConComprasValencia','ListadoClientesConTresOMasCompras',
                'ListadoClientesConTresComprasOMasPorPoblacion','ProveedorPorNif','ListadoProveedores',
                'ProveedoresEmpiezanPorTexto','ProveedoresProductosPvpMayor1000','ProductoPorCodProd',
                'ListadoProductos','ProductosPvpMenorOIgual100','ProductosPVPMayorPromedio','PvpMaximoProductos',
                'PvpMinimoProductos','PvpPromedioProductos','ProductosNombreContieneTexto','ListadoCompras',
                'ComprasDeAnyo','ComprasDeCliente','ComprasDeProducto','ComprasDeProveedor','ComprasDePoblacion',
                'ComprasDeClientesValencia','ComprasConIgualOMasDe2Unidades','ComprasConMasDe3productos',
                'ComprasMinimo10Unidades'
            ];
            foreach($opciones as $opc) echo "<option value='$opc'>$opc</option>";
            ?>
        </select>

        <label for="dni">DNI:</label>
        <select name="dni" id="dni">
            <?= getOpciones('CLIENTE','DNI'); ?>
        </select>

        <label for="poblacion">Población:</label>
        <select name="poblacion" id="poblacion">
            <?= getOpciones('CLIENTE','POBLACION','POBLACION'); ?>
        </select>

        <label for="proveedor">Proveedor:</label>
        <select name="proveedor" id="proveedor">
            <?= getOpciones('PROVEEDOR','NIF','NOMBRE'); ?>
        </select>

        <label for="producto">Producto:</label>
        <select name="producto" id="producto">
            <?= getOpciones('PRODUCTO','COD_PROD','NOMBRE'); ?>
        </select>

        <label for="parametro">Parámetro:</label>
        <input type="text" name="parametro" id="parametro">

        <br><br>
        <input type="submit" value="Consultar">
    </form>
</body>
</html>
