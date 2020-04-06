<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Veiculos extends CI_Controller
{

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */

    public function __construct()
    {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('veiculos_model', '', true);
        $this->data['menuVeiculos'] = 'Veiculos';
        
    }

    function index()
    {
        $this->gerenciar();
        
    }

    function gerenciar()
    {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vVeiculo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar Veiculos.');
            redirect(base_url());
        }

        $this->load->library('table');
        $this->load->library('pagination');


        $config['base_url'] = base_url() . 'index.php/veiculos/gerenciar/';
        $config['total_rows'] = $this->veiculos_model->count('veiculos');
        $config['per_page'] = 20;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $this->data['results'] = $this->veiculos_model->get('veiculos', 'idveiculos,clientes_id,placa,imei,numero_rastre,name,tipo,modelo,marca,cor,ano,apelido', '', $config['per_page'], $this->uri->segment(3));

        $this->data['view'] = 'veiculos/veiculos';
        $this->load->view('tema/topo', $this->data);
    }

    function adicionar()
    {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aVeiculo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar veiculos.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('veiculos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(                
                    'clientes_id' => $this->input->post('clientes_id'), 
                    'placa' => set_value('placa'),
                    'imei' => set_value('imei'),
                    'numero_rastre' => set_value('numero_rastre'),
                    'tipo' => set_value('tipo'),
                    'modelo' => set_value('modelo'),
                    'marca' => set_value('marca'),
                    'cor' => set_value('cor'),
                    'ano' => set_value('ano'),
                    'name' => set_value('name'),
                    'apelido' => set_value('apelido')
                    
            );
                    
            if ($this->veiculos_model->add('veiculos', $data) == true) {
                $this->session->set_flashdata('success', 'Veiculo adicionado com sucesso!');
                redirect(base_url() . 'index.php/veiculos/adicionar/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
            }
        }
        $this->data['view'] = 'veiculos/adicionarVeiculo';
        $this->load->view('tema/topo', $this->data);
    }

    function editar()
    {

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eVeiculo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar veiculos.');
            redirect(base_url());
        }
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('veiculos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'clientes_id' => $this->input->post('clientes_id'),
                'placa' => $this->input->post('placa'),
                'imei' => $this->input->post('imei'),
                'numero_rastre' => $this->input->post('numero_rastre'),
                'tipo' => $this->input->post('tipo'),
                'modelo' => $this->input->post('modelo'),
                'marca' => $this->input->post('marca'),
                'cor' => $this->input->post('cor'),
                'ano' => $this->input->post('ano'),
                'name' => $this->input->post('name'),
                'apelido' => $this->input->post('apelido')
            );

            if ($this->veiculos_model->edit('veiculos', $data, 'idVeiculos', $this->input->post('idVeiculos')) == true) {
                $this->session->set_flashdata('success', 'Veiculo editado com sucesso!');
                redirect(base_url() . 'index.php/veiculos/editar/' . $this->input->post('idVeiculos'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }

        $this->data['result'] = $this->veiculos_model->getById($this->uri->segment(3));
        $this->data['view'] = 'veiculos/editarVeiculo';
        $this->load->view('tema/topo', $this->data);
        $dados['clientes'] = $this->db->get('clientes')->result();
        $this->db->join('clientes','idClientes=clientes_id','inner' );
    }

      function visualizar()
    {

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vVeiculo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar Veiculos.');
            redirect(base_url());
        }

        $this->data['result'] = $this->veiculos_model->getById($this->uri->segment(3));

        if ($this->data['result'] == null) {
            $this->session->set_flashdata('error', 'Veiculo não encontrado.');
            redirect(base_url() . 'index.php/veiculos/editar/' . $this->input->post('idveiculos'));
        }

        $this->data['view'] = 'veiculos/visualizarVeiculo';
        $this->load->view('tema/topo', $this->data);
    }

    public function autoCompleteCliente()
    {

        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->vendas_model->autoCompleteCliente($q);
        }
    }

    
    
    function excluir()
    {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dVeiculo')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir veiculos.');
            redirect(base_url());
        }


        $id =  $this->input->post('id');
        if ($id == null) {

            $this->session->set_flashdata('error', 'Erro ao tentar excluir Veiculo.');
            redirect(base_url() . 'index.php/veiculos/gerenciar/');
        }

        $this->db->where('veiculos_id', $id);
        $this->db->delete('veiculos_os');


        $this->db->where('veiculos_id', $id);
        $this->db->delete('itens_de_vendas');

        $this->veiculos_model->delete('veiculos', 'idveiculos', $id);


        $this->session->set_flashdata('success', 'Veiculo excluido com sucesso!');
        redirect(base_url() . 'index.php/veiculos/gerenciar/');
    }

      

}

  
    