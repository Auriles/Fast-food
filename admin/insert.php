<?php

  require 'database.php';

?>

<!DOCTYPE html>

<html>

  <head>
    <title>Burger Code</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>

    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">
        <div class="row">
          <h1><strong>Ajouter un item </strong></h1>
          <br>
          <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
            <!-- Nom -->
            <div class="form-group">
              <label for="name">Nom: </label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
              <span class="help-inline"><?php echo $nameError; ?></span>
            </div>
            <!-- Description -->
            <div class="form-group">
              <label for="description">Description: </label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
              <span class="help-inline"><?php echo $descriptionError; ?></span>
            </div>
            <!-- Prix -->
            <div class="form-group">
              <label for="price">Prix: (en €) </label>
              <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price; ?>">
              <span class="help-inline"><?php echo $priceError; ?></span>
            </div>
            <!-- Catégorie -->
            <div class="form-group">
              <label for="category">Catégorie: </label>
              <select name="category" id="category" class="form-control">
                <?php

                  $db = Database::connect();
                  foreach($db->query('SELECT * FROM categories') AS $row) {
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                  }
                  $Database::disconnect();
                ?>
              </select>
              <span class="help-inline"><?php echo $categoryError; ?></span>
            </div>
            <!-- Image -->
            <div class="form-group">
              <label for="image">Sélectionner une image:</label>
              <input type="file" id="image" name="image">
              <span class="help-inline"><?php echo $imageError; ?></span>
            </div>
          </form>
          <br>
          <div class="form-actions">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
            <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
          </div>



        </div>
    </div>

  </body>

</html>
