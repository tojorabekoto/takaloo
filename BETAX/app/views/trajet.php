
<?php foreach($trajets as $t): ?>
<tr>
<td><?=htmlspecialchars($t['id'])?></td>
<td><?=htmlspecialchars($t['matricule'])?></td>
<td><?=htmlspecialchars($t['chauffeur_nom'])?></td>
<td><?=htmlspecialchars($t['point_depart'])?></td>
<td><?=htmlspecialchars($t['point_arrivee'])?></td>
<td><?=htmlspecialchars($t['distance_km'])?></td>
<td><?=htmlspecialchars($t['date_debut'])?></td>
<td><?=htmlspecialchars($t['recette'])?></td>
<td><?=htmlspecialchars($t['carburant'])?></td>
</tr>
<?php endforeach; ?>

<h2>Ajouter Trajet</h2>
<form method="post">
<label>Véhicule
<select name="id_vehicule">
<?php foreach($vehicules as $v): ?>
<option value="<?= $v['id'] ?>"><?= htmlspecialchars($v['matricule']) ?></option>
<?php endforeach; ?>
</select>
</label><br>
<label>Chauffeur
<select name="id_chauffeur">
<?php foreach($chauffeurs as $c): ?>
<option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nom'].' '.$c['prenom']) ?></option>
<?php endforeach; ?>
</select>
</label><br>
<label>Point depart<input name="point_depart" required></label><br>
<label>Point arrivee<input name="point_arrivee" required></label><br>
<label>Distance_km<input name="distance_km" required></label><br>
<label>Date debut<input name="date_debut" type="datetime-local" required></label><br>
<label>Date fin<input name="date_fin" type="datetime-local" required></label><br>
<label>Recette<input name="recette" required></label><br>
<label>Carburant<input name="carburant" required></label><br>
<button>Ajouter</button>