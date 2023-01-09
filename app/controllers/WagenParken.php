<?php

class WagenParken extends Controller
{

  private $wagenparkModel;


  public function __construct()
  {
    $this->wagenparkModel = $this->modal('Wagenpark');
  }

  public function index()
  {
    $result = $this->wagenparkModel->getKmStand();
    // if ($result) {
    //   $instructeurNaam = $result[0]->INNA;
    // } else {
    //   $instructeurNaam = '';
    // }
    // var_dump($result);

    $rows = '';
    foreach ($result as $info) {
      $rows .= "<tr>
        <td>$info->Type</td>
        <td>$info->Kenteken</td>
        <td><a href='" . URLROOT . "/wagenparken/addKmstand/{$info->id}'><img src='" . URLROOT . "/img/b_help.png' alt=''></a></td>
      </tr>";
    }

    $data = [
      'title' => 'Invoegen Kilometerstand',
      'rows' => $rows,

    ];
    $this->View('wagenpark/index', $data);
  }

  public function addKmstand($AutoId = NULL)
  {
    $data = [
      'title' => 'Invoegen Kilometerstand',
      'AutoId' => $AutoId,
      'kmstandErrors' => ''
    ];


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // var_dump($_POST);
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      var_dump($_POST);

      $data = [
        'title' => 'Invoegen Kilometerstand',
        'AutoId' => $_POST['AutoId'],
        'kmstandErrors' => '',
      ];

      if (empty($data['kmstandErrors'])) {
        $result = $this->wagenparkModel->addKmstand($_POST);
        if ($result) {
          echo "<p>De nieuwe kilometerstand is toegevoegd</p>";
        } else {
          echo "<p>De nieuwe kilometerstand is niet toegevoegd. Probeer het opnieuw</p>";
        }
        header('Refresh:5; url=' . URLROOT . '/wagenpark/index/');
      } else {
        header('refresh:3; url=' . URLROOT . '/wagenpark/addKmstand/' . $data['AutoId']);
      }
    }
    $this->view('wagenpark/addKmstand', $data);
  }
}