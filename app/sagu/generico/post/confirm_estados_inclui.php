<?php 

require("../../common.php"); 

$id = $_POST['id'];
$nome = $_POST['nome'];
$ref_pais = $_POST['ref_pais'];

function Get_pais($id,$SaguAssert)
{
    $sql = "select nome from pais where id=$id";

    $conn = new Connection;

    $conn->Open();

    $query = $conn->CreateQuery($sql);

    if ( $query->MoveNext() )
      $obj = $query->GetValue(1);

    $query->Close();

    $conn->Close();

    if ( $SaguAssert )
      SaguAssert(!empty($obj),"Pais [$id] nao definido!");

    return $obj;
}

CheckFormParameters(array("id","nome","ref_pais"));
?>

<html>
<head>
</head>
<body bgcolor="#FFFFFF" marginwidth="20" marginheight="20">
<form method="post" action="estados_inclui.php" name="myform">
  <table width="90%" align="center">
    <tr bgcolor="#000099">
      <td height="35" colspan="2">
        <div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#CCCCFF">Confirme a Opera&ccedil;&atilde;o</font></b></font><font size="4" face="Verdana,
Arial, Helvetica, sans-serif"><b></b></font></div>
      </td>
    </tr>
    <tr valign="middle">
      <td colspan="2" height="34">
        <div align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="3"><b>Inclus&atilde;o de Estados</b></font> </div>
        <hr size="1">
      </td>
    </tr>
    <tr valign="middle">
      <td colspan="2" height="24"><font color="#FF0000" size="2" face="Verdana,
Arial, Helvetica, sans-serif">&nbsp;Verifique
        se os dados est&atilde;o corretos.</font></td>
    </tr>
    <tr valign="middle">
      <td colspan="2" height="15">&nbsp;</td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF" width="42%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">C&oacute;digo</font></td>
      <td bgcolor="#FFFFFF" width="58%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b> 
        <script language="PHP">
echo($id);
</script>
        </b></font></td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF" width="42%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Nome</font></td>
      <td bgcolor="#FFFFFF" width="58%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b> 
        <script language="PHP">
echo($nome);
</script>
        </b></font></td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF" width="42%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Pa&iacute;s</font></td>
      <td bgcolor="#FFFFFF" width="58%"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b> 
        <script language="PHP">
echo($ref_pais . " " . Get_pais($ref_pais,true));
</script>
        </b></font></td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <hr size="1">
      </td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <input type="hidden" name="id" value="<?echo($id);?>">
        <input type="hidden" name="nome" value="<?echo($nome);?>">
        <input type="hidden" name="ref_pais" value="<?echo($ref_pais);?>">
      </td>
    <tr>
      <td align="center" colspan="2"> 
        <input type="submit" name="Submit"  value=" Salvar ">
        <input type="button" name="Submit2" value=" Alterar " onClick="history.go(-1)">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
