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
    $first = '';

    foreach ($result as $info) {
      $rows .= "<tr>
        <td>$info->Datum</td>
        <td>$info->Mankement</td>
      </tr>";
      $first = "Auto van instructeur: $info->INNA <br>
      Email: $info->EM <br>
      Kenteken: $info->AK <br>
      Type: $info->AT <br>
      <br>";
    }

    $data = [
      'title' => "Overzicht Mankementen",
      'rows' => $rows,
      'first' => $first,
    ];
    $this->View('mankementen/index', $data);
  }

  public function addMankementen($instructeurId = 2)
  {
    $data = [
      'title' => 'Invoegen Mankementen',
      'instructeurId' => $instructeurId,
      'MankementenErrors' => ''
    ];


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // var_dump($_POST);
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      var_dump($_POST);

      $data = [
        'title' => 'Invoegen Mankementen',
        'instructeurId' => $instructeurId,
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
        header('refresh:3; url=' . URLROOT . '/mankementen/addMankementen/' . $data['AutoId']);
      }
    }
    $this->view('mankementen/addMankementen', $data);
  }
}