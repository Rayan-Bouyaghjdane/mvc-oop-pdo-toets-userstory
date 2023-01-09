<?php

class WagenPark
{

  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getKmstand()
  {
    $this->db->query("SELECT auto.Type, auto.Kenteken, kilometerstand.id
    FROM kilometerstand 
    INNER JOIN auto 
    ON kilometerstand.AutoId = auto.id");

    $result = $this->db->resultSet();

    return $result;
  }

  public function addKmstand($post)
  {
    $sql = "INSERT INTO kilometerstand (id, AutoId, Datum, KmStand) VALUES (NULL, :AutoId, '2022-12-12 10:53:01.000000', :KmStand)";
    $this->db->query($sql);
    $this->db->bind(':AutoId', $post['AutoId']);
    $this->db->bind(':KmStand', $post['KmStand']);
    return $this->db->execute();
  }
}