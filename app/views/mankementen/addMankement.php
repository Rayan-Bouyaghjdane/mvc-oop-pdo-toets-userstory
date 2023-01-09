<?php require(APPROOT . '/views/includes/header.php'); ?>
<h3><?= $data['title'] ?></h3>

<form action="<?= URLROOT ?>/wagenparken/addKmstand" method="post">
  <label for="mankementen">Mankementen</label><br>
  <input type="text" name="mankementen" id="mankementen"><br>
  <div class="mankementenErrors"><?= $data['mankementenErrors']; ?></div>
  <br>
  <input type="hidden" name="AutoId" value="<?= $data['AutoId'] ?>">
  <input type="submit" value="Toevoegen">
</form>
<?php require(APPROOT . '/views/includes/footer.php'); ?>