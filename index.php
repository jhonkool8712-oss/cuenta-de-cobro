<?php
require 'db.php';

function getPrecioHora($dependencia, $zona, $tipoDia) {
    if ($tipoDia === 'dominical') {
        return 40000;
    }

    if ($dependencia === 'bienestar_social') {
        return $zona === 'rural' ? 32000 : 29000;
    }

    return $zona === 'rural' ? 31000 : 29000;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'] ?? '';
    $dependencia = $_POST['dependencia'] ?? '';
    $zona = $_POST['zona'] ?? '';
    $tipoDia = $_POST['tipo_dia'] ?? 'normal';
    $horas = (int)($_POST['horas'] ?? 0);

    if ($fecha && $dependencia && $zona && $horas > 0) {
        $precioHora = getPrecioHora($dependencia, $zona, $tipoDia);
        $total = $horas * $precioHora;

        $stmt = $pdo->prepare('INSERT INTO trabajos (fecha, dependencia, zona, tipo_dia, horas, precio_hora, total) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$fecha, $dependencia, $zona, $tipoDia, $horas, $precioHora, $total]);

        $message = 'Registro guardado con éxito.';
    } else {
        $message = 'Por favor complete todos los campos y use una cantidad de horas válida.';
    }
}

$trabajos = $pdo->query('SELECT * FROM trabajos ORDER BY fecha DESC')->fetchAll(PDO::FETCH_ASSOC);
$dependencias = [
    'administrativa' => 'Administrativa',
    'inspeccion_vigilancia' => 'Inspección y Vigilancia',
    'transporte' => 'Transporte',
    'pae' => 'PAE',
    'bienestar_social' => 'Bienestar Social'
];
$zonas = ['urbana' => 'Urbana', 'rural' => 'Rural'];
$tiposDia = ['normal' => 'Normal', 'dominical' => 'Dominical'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Horas - Secretaría de Educación</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Horas de Trabajo</h1>
        <p>Seleccione dependencia, zona, fecha y horas para calcular el valor.</p>

        <?php if ($message): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <form method="post">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="dependencia">Dependencia</label>
            <select id="dependencia" name="dependencia" required>
                <option value="">Seleccione...</option>
                <?php foreach ($dependencias as $key => $label): ?>
                    <option value="<?= $key ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select>

            <label for="zona">Zona</label>
            <select id="zona" name="zona" required>
                <option value="">Seleccione...</option>
                <?php foreach ($zonas as $key => $label): ?>
                    <option value="<?= $key ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select>

            <label for="tipo_dia">Tipo de día</label>
            <select id="tipo_dia" name="tipo_dia" required>
                <?php foreach ($tiposDia as $key => $label): ?>
                    <option value="<?= $key ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select>

            <label for="horas">Horas</label>
            <input type="number" id="horas" name="horas" min="1" value="1" required>

            <button type="submit">Guardar registro</button>
        </form>

        <section class="table-section">
            <h2>Registros guardados</h2>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Dependencia</th>
                        <th>Zona</th>
                        <th>Tipo de día</th>
                        <th>Horas</th>
                        <th>Precio/hora</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trabajos as $fila): ?>
                        <tr>
                            <td><?= htmlspecialchars($fila['fecha']) ?></td>
                            <td><?= htmlspecialchars($dependencias[$fila['dependencia']] ?? $fila['dependencia']) ?></td>
                            <td><?= htmlspecialchars(ucfirst($fila['zona'])) ?></td>
                            <td><?= htmlspecialchars(ucfirst($fila['tipo_dia'])) ?></td>
                            <td><?= htmlspecialchars($fila['horas']) ?></td>
                            <td>$<?= number_format($fila['precio_hora'], 0, ',', '.') ?></td>
                            <td>$<?= number_format($fila['total'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>