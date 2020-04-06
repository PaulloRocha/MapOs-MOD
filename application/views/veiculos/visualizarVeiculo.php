<div class="accordion" id="collapse-group">
    <div class="accordion-group widget-box">
        <div class="accordion-heading">
            <div class="widget-title">
                <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                    <span class="icon"><i class="icon-list"></i></span>
                    <h5>Dados do Veiculo</h5>
                </a>
            </div>
        </div>
        <div class="collapse in accordion-body">
            <div class="widget-content">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="text-align: right"><strong>Cliente</strong></td>
                            <td>
                            <?php echo $result->clientes_id ?>
                            </td>
                            </tr>
                        <tr>
                            <td style="text-align: right"><strong>Placa</strong></td>
                            <td>
                            <?php echo $result->placa ?>
                            </td>
                        </tr>                   
                        <tr>
                            <td style="text-align: right"><strong>Imei</strong></td>
                            <td>
                            <?php echo $result->imei; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Número</strong></td>
                            <td>
                            <?php echo $result->numero_rastre; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Tipo</strong></td>
                            <td>
                            <?php echo $result->tipo; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Modelo</strong></td>
                            <td>
                            <?php echo $result->modelo; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Marca</strong></td>
                            <td>
                            <?php echo $result->marca; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Cor</strong></td>
                            <td>
                            <?php echo $result->cor; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Ano</strong></td>
                            <td>
                            <?php echo $result->ano; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Rastreador</strong></td>
                            <td>
                            <?php echo $result->name; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Descrição</strong></td>
                            <td>
                            <?php echo $result->apelido; ?>
                            </td>
                        </tr>                                                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>