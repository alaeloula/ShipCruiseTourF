<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      if (isLoggedIn()) {
        if ($_SESSION['user_role']== 1) {
          redirect('admin/index');
        } else {
          redirect('client/index');

        }
        
      }
      $data = [
        'title' => 'SharePosts',
        'description' => 'Simple social network built on the TraversyMVC PHP framework'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/about', $data);
    }
    public function contact(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/contact', $data);
    }

    public function test()
    {
    $this->view('pages/test');
    }

  }