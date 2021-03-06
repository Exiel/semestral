<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class documento extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->database();
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->model('documento_model');
  }

  public function index() {
    $documentos = $this->documento_model->get_documentos();
    $data['documentos'] = $documentos;
    $this->load->view('documentos_view', $data);
  }

  public function editar($id) {
    $data['id'] = $id;

    $data['descripcion'] = $this->documento_model->get_descripcion($id);

    $this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('documento_editar_view', $data);
    } else {
      $data = array(
        'descripcion' => $this->input->post('descripcion'),
      );

      $this->db->update('documento', $data);
      $this->db->where('id', $id);

      $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Documento editado con &eacute;xito.</div>');
      redirect('documento');
    }
  }
}
