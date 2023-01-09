<?php require(APPROOT . '/views/includes/header.php'); ?>
<h3><?= $data['title'] ?></h3>

<form action="<?= URLROOT ?>/wagenparken/addKmstand" method="post">
  <label for="Kmstand">Kilometerstand</label><br>
  <input type="text" name="KmStand" id="KmStand"><br>
  <div class="kmstandErrors"><?= $data['kmstandErrors']; ?></div>
  <br>
  <input type="hidden" name="AutoId" value="<?= $data['AutoId'] ?>">
  <input type="submit" value="Toevoegen">
</form>
<?php require(APPROOT . '/views/includes/footer.php'); ?>