<?php 

require("../common.php"); 

$id = $_GET['id'];

CheckFormParameters(array("id"));

$conn = new Connection;

$conn->Open();

$sql = " select id, " .
       "        razao_social, ".
       "        sigla, " .
       "        rua, " .
       "        complemento, " .
       "        bairro, " .
       "        cep, " .
       "        ref_cidade, " .
       "        get_cidade(ref_cidade) " .
       " from configuracao_empresa " .
       " where id = '$id'";

$query = $conn->CreateQuery($sql);

SaguAssert($query && $query->MoveNext(),"Registro não encontrado!");

list ( $id,
       $razao_social,
       $sigla,
       $rua,
       $complemento,
       $bairro,
       $cep,
       $ref_cidade,
       $cidade_nome) = $query->GetRowValues();

$query->Close();
$conn->Close();

?>

<html>
<head>
<script language="JavaScript">
function buscaCidade()
{
  var url;
   url = '../generico/post/lista_cidades.php' + 
         '?cnome=' + escape(document.myform.cnome.value);

   window.open(url,"popWindow","toolbar=no,width=600,height=368,top=5,left=5,directories=no,menubar=no,scrollbars=yes");
}


function setResult(id,nome,cep)
{
   document.myform.ref_cidade.value = id;
   document.myform.cnome.value = nome;
   document.myform.cep.value = cep;
}

</script>
</head>
<body bgcolor="#FFFFFF" marginwidth="20" marginheight="20">
<form method="post" action="post/altera_configuracao.php" name="myform">
  <table width="90%" align="center">
    <tr> 
      <td bgcolor="#000099" colspan="2" height="28" align="center">
        <font size="3" face="Verdana, Arial, Helvetica, sans-serif" color="#CCCCFF"><b>Empresa</b></font></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;C&oacute;digo&nbsp;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#0000FF"><? echo($id); ?>
        <input type="hidden" name="id" value="<? echo($id); ?>">
        </font></td>
    </tr> 
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Raz&atilde;o Social&nbsp;</font></td>
      <td> 
        <input name="razao_social" type=text size="50" value="<?echo($razao_social);?>" maxlength="199">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Sigla</font></td>
      <td> 
        <input name="sigla" type=text size="10" value="<?echo($sigla)?>" maxlength="29">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Rua&nbsp;</font></td>
      <td> 
        <input name="rua" type=text size="50" value="<?echo($rua)?>" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Complemento&nbsp;</font></td>
      <td> 
        <input name="complemento" type=text size="50" value="<?echo($complemento)?>" maxlength="50">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Bairro&nbsp;</font></td>
      <td> 
        <input name="bairro" type=text value="<?echo($bairro)?>">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Cidade&nbsp;</font></td>
      <td> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="9%"> 
              <div align="left"> 
                <input type="text" name="ref_cidade" size="5" maxlength="10" value="<?echo($ref_cidade)?>">
              </div>
            </td>
            <td width="100%"> 
              <div align="left"><font color="#000000"> 
                <input type="text" name="cnome" size="35" value="<?echo($cidade_nome)?>">
                </font></div>
            </td>
            <td width="0"><font color="#000000"><font color="#000000"> <font color="#000000"> 
              <input type="button" value="..." onClick="buscaCidade(1)" name="button">
              </font></font></font></td>
          </tr>
        </table>
        
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Cep&nbsp;</font></td>
      <td> 
        <input name="cep" type=text size="9" maxlength="9" value="<?echo($cep)?>">
      </td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <hr size="1">
      </td>
    </tr>
    <tr> 
      <td colspan="2" align="center"> 
        <input type="submit" name="Submit"  value=" Salvar ">
        <input type="button" name="Button2" value=" Voltar " onclick="javascript:history.go(-1)">
      </td>
    </tr>
  </table>
  </form>
  </body>
</html>
