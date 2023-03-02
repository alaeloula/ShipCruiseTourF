<?php
class client extends Controller
{
  private $clientModel;
  public function __construct()
  {
    $this->clientModel = $this->Model('Clientm');
  }

  public function index()
  {
    // header('Access-Control-Allow-Origin: *');
    $croisiere = $this->clientModel->getCroisiere();
    $traget = $this->clientModel->gettragetvs();
    $data = [
      'croisieres' => $croisiere,
      'traget' => $traget
    ];
    // echo json_encode($data);
    $this->view('client/index', $data);
  }
  public function getBooking($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      // $detail = $this->clientModel->getDetail($id);
      $data = [
        'id_cr' => $id,

        'id_t' => trim($_POST['room']),

      ];

      if ($this->clientModel->addResevation($data)) {
        flash('reservationadd_message', 'new reservation added');
        redirect('client/index/');
      } else {
        die("something went wrong");
      }
    } else {

      $detail = $this->clientModel->getDetail($id);
      $traget = $this->clientModel->gettragetvs();

      $data = [
        'detail' => $detail,
        'traget' => $traget
      ];
      $this->view('client/booking', $data);
    }
  }

  public function panier()
  {
    $traget = $this->clientModel->gettragetvs();

    $reserv = $this->clientModel->getPanier();
    $data = [
      'reserv' => $reserv,
      'traget' => $traget

    ];
    $this->view('client/panier', $data);
  }

  public function cancel($id)
  {
    $traget = $this->clientModel->gettragetvs();
    $reserv = $this->clientModel->getPanier();

    $data = [
      'reserv' => $reserv,
      'traget' => $traget,
      'id'=> $id
    ];

    $d1 = $reserv[0]->date_depart;
    $d2 = date('y-m-d h:m:s');
    $d1 = strtotime($d1);
    $d2 = strtotime($d2);
    $diff = abs(round(($d2 - $d1) / (24 * 3600)));
    if ($diff > 2) {

     
      if ($this->clientModel->cancelResevation($id)) {
        
         flash('reservationdelete_message', ' reservation deleted');
         redirect('client/panier');
        
      } else {
        
        die("something went wrong");
      }
    }else{
      
      // flash('reservationdelete_message', ' reservation can\'t be deleted');

      // $this->view('client/panier', $data);
      // exit;
    }

    // $this->view('client/panier', $data);
    // die(date("Y/m/d")-$reserv[0]->date_depart);
  }


  public function filterCr($id)
  {
   
    $croisiere = $this->clientModel->getCroisiereF($id);
    $traget = $this->clientModel->gettragetvs();
    $data = [
      'croisieres' => $croisiere,
      'traget' => $traget
    ];
    echo json_encode($data);
    
   
  }
  public function filterNavire($id)
  {
   
    $croisiere = $this->clientModel->getCroisiereF2($id);
    
    $data = [
      'croisieres' => $croisiere,
    ];
    echo json_encode($data);
    
   
  }
  public function filterDate($id)
  {
   
    $croisiere = $this->clientModel->getCroisiereF3($id);
    
    $data = [
      'croisieres' => $croisiere,
    ];
    echo json_encode($data);
    
   
  }


  public function getUser()
  {
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json ; charset=utf-8');
    header("Access-Control-Allow-Methods:"); 
    header("Access-Control-Allow-Headers: *");

   $users=$this->clientModel->getUsers();
    $data = [
      'users' => $users,
      
    ];
   
    echo json_encode($data);
  }
  
}
