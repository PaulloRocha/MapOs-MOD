<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Veiculos_model extends CI_Model
{

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */

    function __construct()
    {
        parent::__construct();
    }


    function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
        $this->db->select($fields + ', clientes.nomeCliente');
        $this->db->from($table);
        $this->db->join('clientes', 'clientes.idClientes = '.$table.'.clientes_id');
        $this->db->order_by('idVeiculos', 'desc');
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }

        $query = $this->db->get();

        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getById($id)
    {
        $this->db->where('idVeiculos', $id);
        $this->db->join('clientes', 'clientes.idClientes = veiculos.clientes_id');
        $this->db->limit(1);
        return $this->db->get('veiculos')->row();
    }

    function add($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            return true;
        }

        return false;
    }
  
    function edit($table, $data, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0) {
            return true;
        }

        return false;
    }

    function delete($table, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return true;
        }

        return false;
    }

public function autoCompleteCliente($q)
{

    $this->db->select('*');
    $this->db->limit(5);
    $this->db->like('nomeCliente', $q);
    $query = $this->db->get('clientes');
    if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row) {
            $row_set[] = array('label'=>$row['nomeCliente'].' | Telefone: '.$row['telefone'],'id'=>$row['idClientes']);
        }
        echo json_encode($row_set);
    }
}
function count($table)
{
    return $this->db->count_all($table);
}

public function cont_veiculos ()
      {

        $this->db->select('veiculo_tipo');
        $this->db->from('veiculos');
        $this->db->where('tipo', 'Carro');
        echo $this->db->count_all_results();
      }
}
