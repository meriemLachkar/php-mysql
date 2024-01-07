<?php
$query = "SELECT * FROM todo ORDER BY created_at DESC"; 

$result = mysqli_query($connexion, $query);

$taches = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $taches[] = $row;
    }
} else {
    echo "Erreur lors de la récupération des tâches : " . mysqli_error($connexion);
}