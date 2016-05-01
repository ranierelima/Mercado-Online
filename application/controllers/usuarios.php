<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{

    public function cadastrar(){
        
        $usuario = array(
            "nome"=>$this->input->post("nome"),
            "email"=>$this->input->post("email"),
            "senha"=>md5($this->input->post("senha"))
        );
        
        $this->load->model("usuarios_model");
        $this->usuarios_model->cadastrar($usuario);
        
        $this->load->view("usuarios/index");
    }
    
    public function autenticar(){
        
        $email = $this->input->post("email");
        $senha = md5($this->input->post("senha"));
    
        $this->load->model("usuarios_model");
        $usuario = $this->usuarios_model->autenticar($email,$senha);
        if($usuario != null){
            $this->session->set_userdata("usuarioLogado",$usuario);
            $this->session->set_flashdata("success","Validado com sucesso");
        }else{
            $this->session->set_flashdata("danger","E-mail ou Senha errada");
        }
        redirect("/");
        
    }
    
    public function deslogado(){
        $this->session->unset_userdata("usuarioLogado");
        $this->session->set_flashdata("success","Deslogado");
        redirect("/");
    }

}