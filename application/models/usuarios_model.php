<?php

class Usuarios_model extends CI_Model{

    public function cadastrar($Usuario){
        $this->db->insert("usuarios",$Usuario);
    }

    public function autenticar($email, $senha){
        $this->db->where("email",$email);
        $this->db->where("senha ",$senha);
        return $this->db->get("usuarios")->row_array();
    }
}