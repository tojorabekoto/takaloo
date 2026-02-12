<?php foreach ($chauffeurs as $c): ?>
<tr>
    <td><?= htmlspecialchars($c['id']) ?></td>
    <td><?= htmlspecialchars($c['nom']) ?></td>
    <td><?= htmlspecialchars($c['prenom']) ?></td>
</tr>
<?php endforeach; ?>

