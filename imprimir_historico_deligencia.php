

<?php

include_once "dao/conexao.php";

$idDeligencia = $_GET["idDeligencia"];


$sql4 = "SELECT H.situacao, H.dataAlteracao, H.horaAlteracao, U.nomeUsuario FROM historico_deligencia H INNER JOIN deligencia D ON D.idDeligencia = H.idDeligencia 
INNER JOIN usuario U ON U.idUsuario = H.idUsuario where H.idDeligencia = $idDeligencia";
$res = $con-> query($sql4);
$linha = $res->fetch_assoc();
$resultado_deligencia = mysqli_query($con, $sql4);



  
  
  $html .='<table border=1>';
  $html .= '<thead>';
  $html .='<tr>';

  $html .='<td> Data da alteração </td>';
  $html .='<td> Hora da alteração </td>';
  $html .='<td> Situação </td>';
  $html .='<td> Quem alterou </td>';
  
  $html .='</tr>';
  $html .= '</thead>';
  

 
  
  while ($rows_deligencia = mysqli_fetch_assoc($resultado_deligencia)) { 
         $html .= '<tbody>';
         $dataBanco = $rows_deligencia['dataAlteracao'];
         $dataNova = date("d/m/Y", strtotime($dataBanco));
         $html .= '<tr> <td>'  . $dataNova. '</td>';
         $html .= '<td>'  . $rows_deligencia['horaAlteracao']. '</td>';
         $html .= '<td>'  . $rows_deligencia['situacao']. '</td>';
         $html .=  ' <td>' . $rows_deligencia['nomeUsuario']. '</td></tr>';
         $html .= '</tbody>';
  }
  
  
  $html .= '</table>';
 /////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////
  
  
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
  date_default_timezone_set('America/Sao_Paulo');
  session_start();
  $data_hoje = date("d/m/Y");
  $hora_gerada = date("H:i:s");
  $sql_usuario = "SELECT * FROM usuario where idUsuario = $_SESSION[idUsuario]";
  $res = $con->query($sql_usuario);
  $linha_usuario = $res->fetch_assoc();
  use Dompdf\Dompdf;
  
  // include autoloader
  require_once 'dompdf/autoload.inc.php';
  
  $dompdf = new Dompdf();
  $dompdf->loadHtml(' <div align="right"> </div>
  
  
  <center><h2><u>Histórico de deligencia </u></h2></center> 
  

   
       
     
  
      <br>
      <h3> &nbsp; &nbsp; 1 Histórico de atualização:</h3>
    '. $html . '
    <br>

   
  
  
  
 
      
  
     
  
    <p>Documento gerado por '.$linha_usuario['nomeUsuario'].' em '.$data_hoje.' às '.$hora_gerada.'.</p>
  
  
          
      
  
  
          
  
  ');
  
  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4', 'portrait');
  ob_clean();
  // Render the HTML as PDF
  $dompdf->render();
  
  // Output the generated PDF to Browser
  $dompdf->stream('Histórico de deligencia do jovem.pdf',
  array ("Attachment" =>true //para realizar o download somente alterar para true
  )
  );


  ?>