<?php
if(isset($_POST['action'])) {
    include('cnx.php');
    include('db.php');
    $action = $_POST['action'];
    
    switch($action) {
        case 'new':
            if(isset($_POST['id'])) {
                $newTask = $_POST['id'];
                $query = "INSERT INTO todo (task) VALUES ('$newTask')";
                
        
                mysqli_query($connexion, $query);
            }
            break;
            
        case 'delete':
            if(isset($_POST['id'])) {
                $taskId = $_POST['id'];
                

                $query = "DELETE FROM todo WHERE id = $taskId";
                mysqli_query($connexion, $query);
            }
            break;
            
        case 'toggle':
            if(isset($_POST['id'])) {
                $taskId = $_POST['id'];
                
                $query = "UPDATE todo SET done = 1 - done WHERE id = $taskId";
            
                mysqli_query($connexion, $query);
            }
            break;
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Approche</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">TodoList</a>
    </nav>

    <div class="container mt-4">
        <form action="" method="POST">
            <div class="form-row align-items-center mb-3">
                <div class="col-auto">
                    <label class="sr-only" for="title">Task Title</label>
                    <input type="text" class="form-control" id="title" name="id" placeholder="Task Title">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary" name="action" value="new">Add</button>
                </div>
            </div>
        </form>
        <ul class="list-group">
            <?php foreach ($taches as $tache) : ?>
                <?php $cssClass = ($tache['done'] == 1) ? 'list-group-item-success' : 'list-group-item-warning'; ?>
                <li class="list-group-item <?php echo $cssClass; ?>">
                    <?php echo $tache['task']; ?>
                    <form action="" method="POST" class="float-right">
                        <input type="hidden" name="id" value="<?php echo $tache['id']; ?>">
                        <button type="submit" class="btn btn-success" name="action" value="toggle">Toggle</button>
                        <button type="submit" class="btn btn-danger" name="action" value="delete">Supprimer</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>