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
    $this->db->query("SELECT Mankement.Id, Mankement.AutoId, Mankement.Datum, Mankement.Mankement, Instructeur.Naam AS INNA, Instructeur.Email AS EM, Auto.Kenteken AS AK, Auto.Type AS AT
    FROM Mankement 
    INNER JOIN Auto
    ON Mankement.AutoId = Auto.Id
    INNER JOIN Instructeur
    ON Auto.InstructeurId = Instructeur.Id
    WHERE Instructeur.Id = 2;");

    $result = $this->db->resultSet();

    return $result;
  }

  public function addMankement($post)
  {
    $sql = "INSERT INTO Mankement (AutoId, Datum, Mankement) VALUES ( 2, '2023-1-10 10:53:01.000000', :Mankement)";
    $this->db->query($sql);
    $this->db->bind(':KmStand', $post['KmStand']);
    return $this->db->execute();
  }
}