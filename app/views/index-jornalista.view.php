<?php include 'partials/head.php'; ?>
    
<?php include 'partials/sidebar.php'; ?>

    <div id="right-panel" class="right-panel">

        <?php include 'partials/header.php'; 

        $impressos = 0;
        $digitais = 0;
        $redacoes = 0;
        $nClientes = 0;
        foreach($clientes as $cliente){
            if($cliente->funcao == 'cliente' && $cliente->funcionario == $_SESSION['usuario']){
                $nClientes++;
            }
        }
        foreach($todosServicos as $servico){
            if($servico->destinado == $_SESSION['usuario']){
                $redacoes++;
            }
        }
        ?>

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-4 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-note2"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$redacoes;?></span></div>
                                            <div class="stat-heading">Serviços de Redações</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$nClientes;?></span></div>
                                            <div class="stat-heading">Clientes Atribuídos a Você</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Pedidos </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#id</th>
                                                    <th class="avatar">Foto</th>
                                                    <th>Nome</th>
                                                    <th>Produto</th>
                                                    <th>Categoria</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php 
                                            foreach($todosServicos as $servico):
                                                if($servico->destinado == $_SESSION['usuario']):
                                                switch ($servico->status){
                                                    case 'aprovado':
                                                        $cor = 'complete';
                                                    break;
                                    
                                                    case 'reprovado':
                                                        $cor = 'danger';
                                                    break;
                                    
                                                    case 'cancelado':
                                                        $cor = 'danger';
                                                    break;

                                                    case 'pendente':
                                                        $cor = 'warning';
                                                    break;
                                    
                                                    case 'aguardando aprovacao':
                                                        $cor = 'warning';
                                                    break;
                                                }
                                            ?>
                                                
                                                <tr class="servicoListado">
                                                    <td class="serial"><?=$servico->id;?></td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <img class="rounded-circle" src="public/assets/img/user-icon.jpg" alt="">
                                                        </div>
                                                    </td>
                                                    <td><span class="name"><?=$servico->autor;?></span> </td>
                                                    <td><span class="product"><?=$servico->produto;?></span> </td>
                                                    <td><span class="product"><?=$servico->categoria;?></span></td>
                                                    <td>
                                                        <a href="servicos"><span class="badge badge-<?=$cor;?>"><?=$servico->status;?></span></a>
                                                    </td>
                                                </tr>
                                                
                                            <?php 
                                            endif;
                                            endforeach; 
                                            ?>

                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
                <!-- /.orders -->
                
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <?php include 'partials/footerPainel.php'; ?>