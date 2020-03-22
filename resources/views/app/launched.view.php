
    <!-- <hr> -->

    <!-- inicio  conteudo do site-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-2">
                <?php include '../resources/template/app/side-menu.php';?>
            </div>

            <div class="col-md-8" id="main">

                <div class="row justify-content-center" style="margin-top:50px;">

                    <!-- <div class="col"> -->

                        <!-- <div class="row justify-content-center">

                        </div> -->

                    <!-- </div> -->
                    <div class="border-top rounded-bottom" 
                        style="width:500px;padding: 10px; background-color:white;">
                        <h2>Detalhes do lançamento</h2>
                        <hr>
                    <p>
                        <strong>&raquo;</strong> Tipo de lançamento: 
                        <?php 
                            echo $result[0]['applicable'] == 'IN' ? 'Entrada' : 'Saída';
                        ?>
                    </p>
                    <p>
                        <strong>&raquo;</strong> Data: <?php echo $result[0]['date'];?>
                    </p>
                    <p>
                        <strong>&raquo;</strong> Status: 
                        <?php 
                            $statusLink = '';
                            $textoLink = '';
                            switch($result[0]['status'])
                            {
                                case 'PENDING':
                                    $status = 'Pendente';
                                    $statusLink = "?act=paid&historicId={$result[0]['id']}&dateFrom=$dateFrom&dateTo=$dateTo";
                                    $textoLink = $result[0]['applicable'] == 'IN' ? 'marcar como recebido' : 'marcar como pago';
                                break;
                                case 'PAID':
                                    $status = 'Pago';
                                break;
                                case 'RECEIVED':
                                    $status = 'Recebido';
                                break;
                            }
                            echo $status;
                            echo $statusLink != '' ? " - <a href='".$statusLink."'>".$textoLink."</a>" : '';                            
                                                        
                        ?>
                    </p>
                    <p>
                        <strong>&raquo;</strong> Categoria: <?php echo $result[0]['category'];?>
                    </p>
                    <p>
                        <strong>&raquo;</strong> Forma de Pagamento: <?php echo $result[0]['pay_method'];?>
                    </p>
                    <p>
                        <strong>&raquo;</strong> Valor: R$<?php echo $result[0]['value'];?> 
                        <?php 
                            if($result[0]['installments'])
                            {
                                $installmentsView = $result[0]['current_installment']." de ".$result[0]['installments'];
                                echo " - Parcelas: ".$installmentsView;
                            }
                        ?>
                    </p>
                    <p>
                        <strong>&raquo;</strong> Descrição: <?php echo $result[0]['description'];?>
                    </p>
                    <?php
                        // var_dump($result);
                    ?>
                        
                    </div>

                </div>
                                   
                <div class="row">

                    <div class="col">
                    
                        <div class="row">

                        </div>
                    </div>
                
                </div>
      
            </div>

            <div class="col-md-2"></div>

        </div>
    </div>

    <!-- fim conteúdo do site -->

    <!-- fim container -->
