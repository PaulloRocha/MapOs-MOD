<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-truck"></i>
                </span>
                <h5>Cadastro de Veiculo</h5>
            </div>
            <div class="widget-content nopadding">
            <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formVeiculo" method="post" class="form-horizontal">

                <div class="control-group">
                        <label class="control-label" for="cliente">Cliente<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cliente" type="text" name="cliente" value="" />
                            <input id="clientes_id" type="hidden" name="clientes_id" value="" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="placa" class="control-label">Placa<span class="required">*</span></label>
                        <div class="controls">
                            <input id="placa" type="text" name="placa" value="<?php echo set_value('placa'); ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="imei" class="control-label">Imei<span class="required">*</span></label>
                        <div class="controls">
                            <input id="imei" type="text" name="imei" value="<?php echo set_value('imei'); ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="numero_rastre" class="control-label">Número<span class="required">*</span></label>
                        <div class="controls">
                            <input id="numero_rastre" type="text" name="numero_rastre" value="<?php echo set_value('numero_rastre'); ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                    <label for="unidade" class="control-label">Tipo<span class="required">*</span></label>
                    <div class="controls">
                        <!--<input id="unidade" type="text" name="unidade" value="<?php echo set_value('tipo'); ?>"  />-->
                        <select id="tipo" name="tipo">
                            <option value="Carro">Carro</option>
                            <option value="Moto">Moto</option>
                            <option value="Pick-Up">Pick-Up</option>
                            <option value="Caminhão">Caminhão</option>
                            <option value="Trator">Trator</option>                         
                            <option value="Ônibus">Ônibus</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>
                    </div>   

                    <div class="control-group">
                        <label for="modelo" class="control-label">Modelo<span class="required">*</span></label>
                        <div class="controls">
                            <input id="modelo" type="text" name="modelo" value="<?php echo set_value('modelo'); ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="marca" class="control-label">Marca<span class="required">*</span></label>
                        <div class="controls">
                            <input id="marca" type="text" name="marca" value="<?php echo set_value('marca'); ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="cor" class="control-label">Cor<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cor" type="text" name="cor" value="<?php echo set_value('cor'); ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="ano" class="control-label">Ano<span class="required">*</span></label>
                        <div class="controls">
                            <input id="ano" type="text" name="ano" value="<?php echo set_value('ano'); ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="name" class="control-label">Rastreador<span class="required">*</span></label>
                        <div class="controls">
                            <input id="name" type="text" name="name" value="<?php echo set_value('name'); ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="apelido" class="control-label">Descrição<span class="required">*</span></label>
                        <div class="controls">
                            <input id="apelido" type="text" name="apelido" value="<?php echo set_value('apelido'); ?>" />
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar</button>
                                <a href="<?php echo base_url() ?>index.php/veiculos" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>



                            </div>
                        </div>
                    </div>
                </form>
            </div>
         </div>
     </div>
</div>


<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function(event, ui) {
                $("#clientes_id").val(ui.item.id);
            }
        });
        $('#formVeiculo').validate({
            rules: {
                placa: {
                    required: true
                },
                imei: {
                    required: true
                },
                numero_rastre: {
                    required: true
                },
                tipo: {
                    required: true
                },
                modelo: {
                    required: true
                },
                marca: {
                    required: true
                },
                cor: {
                    required: true
                },
                ano: {
                    required: true
                },
            },
            messages: {
                placa: {
                    required: 'Campo Requerido.'
                },
                imei: {
                    required: 'Campo Requerido.'
                },
                numero_rastre: {
                    required: 'Campo Requerido.'
                },
                tipo: {
                    required: 'Campo Requerido.'
                },
                modelo: {
                    required: 'Campo Requerido.'
                },
               marca: {
                    required: 'Campo Requerido.'
                },
                cor: {
                    required: 'Campo Requerido.'
                },
                ano: {
                    required: 'Campo Requerido.'
                },
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
    });
</script>

<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
