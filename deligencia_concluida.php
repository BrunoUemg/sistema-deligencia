<?php
include_once "header.php";

include_once "dao/conexao.php";



$result_consultaDeligencia = "SELECT *  FROM deligencia D INNER JOIN usuario U ON D.idUsuario = U.idUsuario where D.situacao = 1   ";
$resultado_consultaDeligencia = mysqli_query($con, $result_consultaDeligencia);


?>



<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Deligência</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           

      
      
      </div>
      
      


            <div class="card-body">
            <center><h3>Deligências concluídas</h3></center>
           
              <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Número deligência</th>
                      <th>Descrição</th>
                      <th>Prazo para entregar</th>
                      <th>Conclusão</th>
                      <th>Prioridade</th>
                      <th>Administrativo</th>
                        <th>Situação</th>
                      <th>Informação</th>
                      
                    </tr>
                  </thead>
                
                  <tbody>


                    <?php 
                    

                    
                    while ($rows_deligencia = mysqli_fetch_assoc($resultado_consultaDeligencia)) {
                      
                        $query = mysqli_query($con, "SELECT Max(idHistorico_deligencia)  AS codigo FROM historico_deligencia WHERE idDeligencia = '$rows_deligencia[idDeligencia]'");
                        $result2 = mysqli_fetch_array($query);
  
                        $idHistorico_deligencia = $result2['codigo'];
  
                        $select_Recente_historico = mysqli_query($con,"SELECT H.horaAlteracao, H.dataAlteracao, H.situacao, U.nomeUsuario  from historico_deligencia H 
                        INNER JOIN usuario U ON U.idUsuario = H.idUsuario WHERE idHistorico_deligencia = '$idHistorico_deligencia'");
                        $result2 = mysqli_fetch_array($select_Recente_historico);
                      

                      ?>
                      <tr>
                      <td><?php echo $rows_deligencia['idDeligencia']; ?></td>
                        <td><?php echo $rows_deligencia['descricao']; ?></td>
                        <td><?php 
                        $data = date("d/m/Y", strtotime($rows_deligencia['dataPrazo']));
                        echo $data; ?></td>
                        <td>
                        <?php 
                         $data2 = date("d/m/Y", strtotime($result2['dataAlteracao']));
                         echo $data2; ?></td>
                        
                        
                        </td>
                        <td><?php echo $rows_deligencia['prioridade']; ?></td>
               

                        <td><?php echo $rows_deligencia['nomeUsuario']; ?></td>
                        <td><?php 
                        if($result2['situacao'] == null){
                          echo  "Encaminhado para $rows_deligencia[nomeUsuario]";
                        }else{
                            echo $result2['situacao'];
                        }
                        ?></td>
                        <td>
                        <?php echo "<a class='btn btn-default' title='Informações sobre'  href='consultar_administrativo.php?id=" . $rows_deligencia['idDeligencia'] . "' data-toggle='modal' data-target='#ModalInfo" . $rows_deligencia['idDeligencia'] . "'>" ?><i class="fas fa-info"></i><?php echo "</a>"; ?>
                        <?php  echo "<a class='btn btn-default' title='Imprimir histórico' href='imprimir_historico_deligencia.php?idDeligencia=" . $rows_deligencia['idDeligencia'] . "'>" ?><i class="fa fa-file-archive"></i><?php echo "</a>"; ?> 
                      
                          <?php // echo "<a  class='btn btn-default' title='Excluir ' href='excluir_administrativo.php?idAdministrativo=" .$rows_consultaProtocolo['idProtocolo']. "' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">"?> <!--<i class='fas fa-trash-alt'></i> --><?php echo "</a>";  ?>

                          <!-- Modal-->

                         


                        <div class="modal fade" id="ModalInfo<?php echo $rows_deligencia['idDeligencia']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Informações da deligência</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                              

                                   
                                <?php  $query = mysqli_query($con, "SELECT Max(idHistorico_deligencia)  AS codigo FROM historico_deligencia WHERE idDeligencia = '$rows_deligencia[idDeligencia]'");
                                        $result = mysqli_fetch_array($query);
  
                                        $idHistorico_protocolo = $result['codigo'];

                                         $select_Recente_historico = mysqli_query($con,"SELECT H.horaAlteracao, H.dataAlteracao, H.situacao, U.nomeUsuario  from historico_deligencia H 
                                         INNER JOIN usuario U ON U.idUsuario = H.idUsuario WHERE idHistorico_deligencia = '$idHistorico_deligencia'");
                                         $result = mysqli_fetch_array($select_Recente_historico);
                                    

                                    ?>
                                    <input type="text" readonly hidden class="form-control" required name="idDeligencia" value="<?php echo $rows_deligencia['idDeligencia']; ?>">
                                    
                                    
                                    <label>Data da última modificação</label>
                                    <input type="date" readonly class="form-control"  required name="dtNascimento" value="<?php echo $result['dataAlteracao']; ?>">

                                    <label>Hora da última modificação</label>
                                    <input type="time" readonly class="form-control" required name="dtNascimento" value="<?php echo $result['horaAlteracao']; ?>">
                                     
                                    <label for="">Quem modificou</label>
                                    <input type="text" name="" readOnly class="form-control" placeholder="Não houve modificação" value="<?php echo $result['nomeUsuario']; ?>" id="">
                                   


                                    


                           
                               
                                 

                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                 
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div>
                        </td>

                        <div class="modal fade" id="ModalConcluir<?php echo $rows_deligencia['idDeligencia']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Conclusão da deligência</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form action="concluir_deligencia.php" method="POST">


                                <input type="text" readonly hidden class="form-control" required name="idDeligencia" value="<?php echo $rows_deligencia['idDeligencia']; ?>">
                               <input type="checkbox" required="required" name="concluir" id="">
                               
                               <label for="">Confimo a conclusão dessa deligência.</label>    
                               <br>
                               <br>
                                 <label for="">Senha para validação</label>
                                <input type="password" class="form-control" required="required" name="senhaValidacao" id="">
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                  <input type="submit" name="enviar" class="btn btn-success" value="Alterar">
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div>
                        </td>


                      

                        
                      </tr>
                    <?php   } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>

      </div>
  <script src="jquery/jquery-3.4.1.min.js"></script>
  <script src="js/states.js"></script>
  <script src="js/mascaras.js"></script>

  <?php
  include_once "footer.php"
  ?>
  <script>
    $(document).ready(function() {
      $('#basic-datatables').DataTable({
        "language": {
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
          "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
          },
          "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
          }
        }
      });
    });
  </script>
