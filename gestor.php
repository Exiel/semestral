<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class gestor extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->model('gestor_model');
  }

  public function index() {
    $gestores = $this->gestor_model->get_gestores();
    $data['gestores'] = $gestores;
    $this->load->view('gestor_view', $data);
  }

  public function editar($id)
    {
      $data['id'] = $id;
      $this->load->model('gestor_model');
      $data['gestores'] = $this->gestor_model->get_gestor($id);

      //set validation rules
      $this->form_validation->set_rules('nombre', 'Nombre del Gestor', 'trim|required|xss_clean|callback_alpha_only_space');
      $this->form_validation->set_rules('apellido', 'Apellido del Gestor', 'trim|required|xss_clean|callback_alpha_only_space');


      if ($this->form_validation->run() == FALSE)
      {

          $this->load->view('gestor_editar_view', $data);
      }
      else
      {

          $data = array(
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),

          );

          $this->db->where('id', $id);
          $this->db->update('gestor', $data);


          $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Update Gestores</div>');
          redirect('gestor/index');
      }
  }

  function insertar()
     {

         $this->form_validation->set_rules('nombre', 'nombre', 'trim|required|xss_clean|callback_alpha_only_space');
         $this->form_validation->set_rules('apellido', 'apellido', 'trim|required|xss_clean|callback_alpha_only_space');

         if ($this->form_validation->run() == FALSE)
         {
             $data = "";
             $this->load->view('gestor_insert_view', $data);
         }
         else
         {
             $data = array(
                 'nombre' => $this->input->post('nombre'),
                 'apellido' => $this->input->post('apellido'),
                 
             );
             $this->db->insert('gestor', $data);
             $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Gestor Agregado!!!</div>');
             redirect('gestor/index');
         }
     }

     function alpha_only_space($str)
   {
       if (!preg_match("/^([-a-z ])+$/i", $str))
       {
           $this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces');
           return FALSE;
       }
       else
       {
           return TRUE;
       }
   }
}
