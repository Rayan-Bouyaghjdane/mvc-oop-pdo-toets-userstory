<?php

class Mankementen extends Controller
{

  private $mankementenModel;


  public function __construct()
  {
    $this->mankementenModel = $this->modal('Mankement');
  }

  public function index()
  {
    $result = $this->mankementenModel->getMankement();
    // if ($result) {
    //   $instructeurNaam = $result[0]->INNA;
    // } else {
    //   $instructeurNaam = '';
    // }
    // var_dump($result);

    $rows = '';
    foreach ($result as $info) {
      $rows .= "<tr>
        <td>$info->Datum</td>
        <td>$info->Mankement</td>
        <td><a href='" . URLROOT . "/mankementen/addMankement/2'><img src='" . URLROOT . "/img/b_help.png' alt=''></a></td>
      </tr>";
    }

    $data = [
      'title' => 'Overzicht Mankementen',
      'Naam' => ''
      'rows' => $rows,

    ];
    $this->View('mankementen/index', $data);
  }

  public function addMankementen($AutoId = NULL)
  {
    $data = [
      'title' => 'Invoegen Mankementen',
      'AutoId' => $AutoId,
      'MankementenErrors' => ''
    ];


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // var_dump($_POST);
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      var_dump($_POST);

      $data = [
        'title' => 'Invoegen Mankementen',
        'AutoId' => $_POST['AutoId'],
        'MankementenErrors' => '',
      ];

      if (empty($data['MankementenErrors'])) {
        $result = $this->mankementenModel->addKmstand($_POST);
        if ($result) {
          echo "<p>De nieuwe Mankementen is toegevoegd</p>";
        } else {
          echo "<p>De nieuwe Mankementen is niet toegevoegd. Probeer het opnieuw</p>";
        }
        header('Refresh:5; url=' . URLROOT . '/mankementen/index/');
      } else {
        header('refresh:3; url=' . URLROOT . '/mankementen/addMankement/' . $data['AutoId']);
      }
    }
    $this->view('mankementen/addMankementen', $data);
  }
}