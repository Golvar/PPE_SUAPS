<?php require 'administrer.php'; ?>

<form action="" method="POST">
<br><br>
  <div class="from-group">
    <label for="">Prénom : </label>
    <input type="text" name="prenom" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Nom : </label>
    <input type="text" name="nom" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Nom d'utilisateur : </label>
    <input type="text" name="username" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Mail : </label>
    <input type="text" name="mail" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Téléphone : </label>
    <input type="text" name="phone" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Mot de passe : </label>
    <input type="text" name="password" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Type : </label>
    <select class="form-control" name="admin">
      <option  value="0">Golfeur</option>
      <option  value="2">Invité</option>
      <option  value="1">Administrateur</option>
    </select>
  </div>
  <br>
  <button type="submit" name="button" class="btn btn-primary">Enregistrer</button>
  <br>
</form>

<?php require 'inc/footer.php';?>
