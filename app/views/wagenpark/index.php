<?php require(APPROOT . '/views/includes/header.php'); ?>


<h3><?= $data['title'] ?></h3>

<table border='1'>
  <thead>
    <th>Type</th>
    <th>Kenteken</th>
    <th>Kmstand toevoegen</th>
  </thead>
  <tbody>
    <?= $data['rows'] ?>
  </tbody>
</table>

<?php require(APPROOT . '/views/includes/header.php'); ?>