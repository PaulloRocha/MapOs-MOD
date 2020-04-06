<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aVeiculo')) { ?>
    <a href="<?php echo base_url(); ?>index.php/veiculos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Veículo</a> 

    <!-- AQUI ONDE ALTEREI -->
    <div class="container-fluid">
                <div class="quick-actions_homepage">
                    <div class="span10">
                        <ul class="quick-actions">
                            <li class="bg_lb"><a href="#"><i class="fas fa-car" style="font-size:36px"></i><div>Carro: <strong>
                            <?php $this->db->select('veiculo_tipo');
                                     $this->db->from('veiculos');
                                     $this->db->where('tipo', 'Carro');
                                     echo $this->db->count_all_results(); ?></div></a>
                            </li>

                            <li class="bg_ly"><a href="#"><i class="fas fa-motorcycle" style="font-size:36px"></i><div>Moto: <strong>                          
                             <?php $this->db->select('veiculo_tipo');
                                     $this->db->from('veiculos');
                                     $this->db->where('tipo', 'Moto');
                                     echo $this->db->count_all_results(); ?></div></a>
                            </li>

                            <li class="bg_lg"><a href="#"><i class="fas fa-truck-pickup"style="font-size:36px"></i><div>Pick-Up: <strong>
                            <?php $this->db->select('veiculo_tipo');
                                     $this->db->from('veiculos');
                                     $this->db->where('tipo', 'Pick-Up');
                                     echo $this->db->count_all_results(); ?></div></a>
                            </li>

                            <li class="bg_lo"><a href="#"><i class="fas fa-truck" style="font-size:36px"></i><div>Caminhão: <strong>
                            <?php $this->db->select('veiculo_tipo');
                                     $this->db->from('veiculos');
                                     $this->db->where('tipo', 'Caminhão');
                                     echo $this->db->count_all_results(); ?> </div></a>
                            </li>

                            <li class="bg_dy"><a href="#"><i class="fas fa-tractor" style="font-size:36px"></i><div>Trator: <strong>
                            <?php $this->db->select('veiculo_tipo');
                                     $this->db->from('veiculos');
                                     $this->db->where('tipo', 'Trator');
                                     echo $this->db->count_all_results(); ?></div></a>
                            </li>                            


                            <li class="bg_lv"><a href="#"><i class="fas fa-satellite" style="font-size:36px"></i><div>Outros: <strong>
                            <?php $this->db->select('veiculo_tipo');
                                     $this->db->from('veiculos');
                                     $this->db->where('tipo', 'Outros');
                                     echo $this->db->count_all_results(); ?></div></a>
                            </li>                    

                        </ul>

                    </div>

                </div>
            </div>   

    
<?php
} ?>
<?php
if (!$results) { ?>
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="fas fa-car"></i>
         </span>
        <h5>Veiculos</h5>
     </div>
<div class="widget-content nopadding">
<table class="table table-bordered ">
    <thead>
        <tr>
            <th>Cod.</th>
            <th>Cliente</th>
            <th>Placa</th>
            <th>Imei</th>
            <th>Número</th>
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Cor</th>
            <th>Ano</th>
            <th>Rastreador</th>
            <th>descrição</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="5">Nenhum Veículo Cadastrado</td>
        </tr>
    </tbody>
</table>
</div>
</div>
<?php
} else { ?>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="fas fa-car" style="font-size:16px"></i>
         </span>
        <h5>Veiculos</h5>
     </div>
<div class="widget-content nopadding">
<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Cod.</th>
            <th>Cliente</th>
            <th>Placa</th>
            <th>Imei</th>
            <th>Número</th>
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Cor</th>
            <th>Ano</th>
            <th>Rastreador</th>
            <th>descrição</th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td>' . $r->idVeiculos . '</td>';
            echo '<td>' . $r->nomeCliente . '</td>';
            echo '<td>' . $r->placa . '</td>';
            echo '<td>' . $r->imei . '</td>';
            echo '<td>' . $r->numero_rastre . '</td>';
            echo '<td>' . $r->tipo . '</td>';
            echo '<td>' . $r->modelo . '</td>';
            echo '<td>' . $r->marca . '</td>';
            echo '<td>' . $r->cor . '</td>';
            echo '<td>' . $r->ano . '</td>';
            echo '<td>' . $r->name . '</td>';
            echo '<td>' . $r->apelido . '</td>';

            echo '<td>';
            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVeiculo')) {
                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/veiculos/visualizar/' . $r->idVeiculos . '" class="btn tip-top" title="Visualizar Veículo"><i class="fas fa-eye"></i></a>  ';
            }
            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eVeiculo')) {
                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/veiculos/editar/' . $r->idVeiculos . '" class="btn btn-info tip-top" title="Editar Veículo"><i class="fas fa-pencil-alt"></i></a>';
            }
            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dVeiculo')) {
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" veiculo="' . $r->idVeiculos . '" class="btn btn-danger tip-top" title="Excluir Veículo"><i class="	fas fa-trash-alt"></i></a>';
            }
            echo '</td>';
            echo '</tr>';
} ?>
        <tr>
        </tr>
    </tbody>
</table>
</div>
</div>
<?php echo $this->pagination->create_links();
} ?>


<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/veiculos/excluir" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Veiculos</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idVeiculo" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente excluir este Veiculo?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Excluir</button>
  </div>
  </form>
</div>


<script type="text/javascript">
$(document).ready(function() {
   $(document).on('click', 'a', function(event) {
        var veiculo = $(this).attr('Veiculo');
        $('#idVeiculo').val(veiculo);
    });
});
</script>
