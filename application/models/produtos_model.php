<?php

class Produtos_Model extends CI_Model{
    
    /** Cria uma função chamada listarProdutos, que realiza uma consulta na tabela informada no GET,
    e retorna todo os dados da tabela produtos  */
    public function listarProdutos(){
        $produtos = $this->db->get("produtos")->result_array();
        return $produtos;
    }
    public function salva($produto){
        $this->db->insert("produtos", $produto);
        }

    public function buscar($id) {
       return $this->db->get_where("produtos", array(
            "id" => $id))->row_array();
    }
    
    public function alterar($id , $produto){
        $this->db->where("id", $produto['id']);
        $this->db->update('produtos', $produto); 
    }
    
    public function deletar($id){
        $this->db->where("id",$id);
        $this->db->delete("produtos");
    }
}