<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pannes</title>
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
    <h1>Liste des Pannes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Matricule</th>
                <th>Date Début</th>
                <th>Date Fin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pannes as $panne): ?>
                <tr>
                    <td><?= htmlspecialchars($panne['id']) ?></td>
                    <td><?= htmlspecialchars($panne['matricule']) ?></td>
                    <td><?= htmlspecialchars($panne['date_debut_panne']) ?></td>
                    <td><?= htmlspecialchars($panne['date_fin_panne']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>