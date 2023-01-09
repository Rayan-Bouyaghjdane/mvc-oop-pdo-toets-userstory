<?php

class Mankement
{

  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getMankement()
  {
    $this->db->query("SELECT auto.Type, auto.Kenteken, mankement.Mankement
    FROM mankement 
    INNER JOIN auto 
    ON mankement.AutoId = auto.id");

    $result = $this->db->resultSet();

    return $result;
  }

  public function addMankement($post)
  {
    $sql = "INSERT INTO Mankement (id, AutoId, Datum, Mankement) VALUES (NULL, :AutoId, '2022-12-12 10:53:01.000000', :Mankement)";
    $this->db->query($sql);
    $this->db->bind(':AutoId', $post['AutoId']);
    $this->db->bind(':KmStand', $post['KmStand']);
    return $this->db->execute();
  }
}