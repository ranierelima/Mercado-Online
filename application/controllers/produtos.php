<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller{
	
	public function index(){
		
        /** Carrega o arquivo Produtos_Model, que está localizado na pasta Model */
        $this->load->model("Produtos_Model");
        $this->load->helper(array("conversor","url","form","typography","text"));
		
        /** Cria uma variavel que recebe um retorno da função listarProdutos */
		$produtos = $this->Produtos_Model->listarProdutos();;
        
        /** Para padronizar os arrys, cria-se outro array que será passado para a view, 
        e o nome deste array é produtos, e o seu valor é o array produtos */
		$dados = array("produtos"=> $produtos);
		
        /**  Carrega a view na sua pasta e um array com os dados */
		$this->load->view("produtos/index" , $dados);
        
        /** $this->load, é utilizado para carregar paginas. Sejam elas views, models ou controller, 
        também é usado para carregar bibiliotecas, podendo ser bibliotecas de Banco de Dados, 
        E-mail, dentre outras coisas.*/
        
		}
    
    public function formularioCadastro(){
        $this->load->view("produtos/cadastrar");
    }
    
        
    public function mostra($id){
        $this->load->model("produtos_model");
        $produto = $this->produtos_model->buscar($id);
        $dados = array("produto" => $produto);
        $this->load->helper(array("typography","conversor"));
        $this->load->view("produtos/mostra" , $dados);
        
    }
    
    public function editar($id){
        $this->load->model("produtos_model");
        $produto = $this->produtos_model->buscar($id);
        $dados = array("produto" => $produto);
        $this->load->helper(array("typography","conversor"));
        $this->load->view("produtos/editar", $dados);
    
    }
    
   public function cadastrarProduto(){
        $this->load->model("produtos_model");
        $usuarioLogado = $this->session->userdata("usuarioLogado");
       
        $produto = array(
            "nome"=>$this->input->post("nome"),
            "descricao"=>$this->input->post("descricao"),
            "preco"=>$this->input->post("preco"),
            "usuario_id" => $usuarioLogado["id"]
            );
       
        $this->produtos_model->salva($produto);
        $this->session->set_flashdata("success","Produto Cadastrado com sucesso");
        redirect("/");    
    
    }
    
    public function editarProduto(){
        $this->load->model("produtos_model");
        
        $produto = array(
            "id"=>$this->input->post("id"),
            "nome"=>$this->input->post("nome"),
            "descricao"=>$this->input->post("descricao"),
            "preco"=>$this->input->post("preco")
            );
       
        $this->produtos_model->alterar($id, $produto);
        $this->session->set_flashdata("success","Produto Alterado com sucesso");
        redirect("/");    
    
    }
    public function deletarProduto($id){
        $this->load->model("produtos_model");
        $this->produtos_model->deletar($id);
        $this->session->set_flashdata("success","Produto excluido com sucesso");
        redirect("/");
    }
}