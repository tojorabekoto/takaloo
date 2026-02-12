<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salaires des Chauffeurs</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Salaires des Chauffeurs</h1>
    <table>
        <thead>
            <tr>
                <th>Nom du Chauffeur</th>
                <th>Date</th>
                <th>Salaire</th>
                <th>Pourcentage Appliqué</th>
                <th>Bénéfice</th>
                <th>Montant Minimum</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salaires as $salaire): ?>
                <tr>
                    <td><?= htmlspecialchars($salaire['chauffeur_name']) ?></td>
                    <td><?= htmlspecialchars($salaire['jour']) ?></td>
                    <td><?= number_format($salaire['salaire'], 2) ?> MGA</td>
                    <td><?= number_format($salaire['pourcentage'], 2) ?>%</td>
                    <td><?= number_format($salaire['benef'], 2) ?> MGA</td>
                    <td><?= number_format($salaire['montant_minimum'], 2) ?> MGA</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>