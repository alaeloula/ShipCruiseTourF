<?php
class Clientm{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getCroisiere()
    {
        
        $this->db->query('SELECT * FROM `cr_cl`where `date_depart`>= NOW()');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getCroisiere2()
    {
        $dt = date('Y-m-d');
        $this->db->query("SELECT * FROM `cr_cl` WHERE date_depart <=$dt" );
        $results = $this->db->resultSet();
        return $results;
    }
    public function getCroisiereF($id)
    {
        
        $this->db->query("SELECT * FROM `cr_cl` where port_depart =$id");
        $results = $this->db->resultSet();
        return $results;
    }
    public function getCroisiereF2($id)
    {
        
        $this->db->query("SELECT * FROM `cr_cl` where id_navire =$id");
        $results = $this->db->resultSet();
        return $results;
    }
    public function getCroisiereF3($id)
    {
        
        $this->db->query("SELECT * FROM `cr_cl` WHERE LEFT(date_depart,7) = '$id'");
        $results = $this->db->resultSet();
        return $results;
    }
    public function gettragetvs()
    {
        
        $this->db->query('SELECT * FROM `trajetvs`');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getDetail($id)
    {
        
        $this->db->query('SELECT cr.*,n.*,c.* ,t.* FROM cr_cl cr JOIN navire n on n.id_n=cr.id_navire join chambre c on n.id_n =c.id_navire JOIN type_chambre t ON t.id_t=c.id_t where cr.id_croisiere='.$id);
        $results = $this->db->resultSet();
        return $results;
    }
    public function addResevation($data)
    {
        
        $this->db->query('INSERT INTO `reservation`(`id_client`, `id_croisiere`, `id_chambre`) VALUES (:id_cl,:id_cr,:id_ch)');
        
       // Bind values
       $this->db->bind(':id_cr', $data['id_cr']);  
       $this->db->bind(':id_ch', $data['id_t']);  
       $this->db->bind(':id_cl', $_SESSION['user_id']); 
       // Execute
       if ($this->db->execute()) {
           return true;
       } else {
           return false;
       }
    }
    public function getPanier()
    {
        $id=$_SESSION['user_id'];
        $this->db->query('SELECT r.*, cr.* ,t.type ,ch.prix as taman FROM reservation r join cr_cl cr on r.id_croisiere = cr.id_croisiere join chambre ch on r.id_chambre = ch.id_ch join type_chambre t on ch.id_t = t.id_t   where r.id_client='.$id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function cancelResevation($id)
    {
        $this->db->query('DELETE FROM `reservation` WHERE `id_reserv` = :id');
        // Bind values
        $this->db->bind(':id', $id);    
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getUsers()
    {
        $this->db->query('SELECT * FROM user');
        $results = $this->db->resultSet();
        return $results;
    }
    
}