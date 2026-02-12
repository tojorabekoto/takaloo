<?php foreach ($vehicules as $v): ?>
    <tr>
        <td><?= htmlspecialchars($v['id']) ?></td>
        <td><?= htmlspecialchars($v['marque']) ?></td>
        <td><?= htmlspecialchars($v['modele']) ?></td>
        <td><?= htmlspecialchars($v['matricule']) ?></td>
    </tr>
<?php endforeach; ?>