<?php 

require("../../common.php"); 

$nome       = $_POST['nome'];
$sucinto    = $_POST['sucinto'];
$nome_atual = $_POST['nome_atual']; 

CheckFormParameters(array("nome"));

?>

<html>
<head>
</head>
<body bgcolor="#FFFFFF" marginwidth="20" marginheight="20">
<form method="post" action="instituicao_ins.php" name="myform">
  <table width="90%" align="center" height="183">
    <tr bgcolor="#000099"> 
      <td height="35" colspan="2"> 
        <div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#CCCCFF">Confirme a Opera&ccedil;&atilde;o</font></b></font><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><b></b></font></div>
      </td>
    </tr>
    <tr valign="middle"> 
      <td colspan="2" height="34"> 
        <div align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="3"><b>Inclus&atilde;o de Institui&ccedil;&atilde;o</b></font> </div>
        <hr size="1">
      </td>
    </tr>
    <tr valign="middle"> 
      <td colspan="2" height="24"><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;Verifique se os dados est&atilde;o corretos.</font></td>
    </tr>
    <tr valign="middle"> 
      <td colspan="2" height="15">&nbsp;</td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Nome da Institui&ccedil;&atilde;o</font></td>
      <td bgcolor="#FFFFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b> 
        <?php echo($nome) ?> </b></font></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCFF"><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Sucinto</font></td>
      <td bgcolor="#FFFFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b><?PHP echo($sucinto) ?></b></font></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCFF"><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Nome Atual</font></td>
      <td bgcolor="#FFFFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b><?PHP echo($nome_atual) ?></b></font></td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <hr size="1">
      </td>
    </tr>
    <tr> 
      <td height="16" colspan="2"> 
        <input type="hidden" name="nome" value="<?echo($nome);?>">
        <input type="hidden" name="sucinto" value="<?echo($sucinto);?>">
        <input type="hidden" name="nome_atual" value="<?echo($nome_atual);?>">
      </td>
    </tr>
    <tr valign="middle"> 
      <td colspan="2" height="34"> 
        <div align="center"> 
          <input type="submit" name="Submit"  value=" Salvar ">
          <input type="button" name="Submit2" value=" Alterar " onClick="javascript:history.go(-1)">
        </div>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
