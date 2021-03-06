<?php require_once("../common.php"); ?>

<html>
    <head>
        <title>Atualização de Filiação</title>
        <script language="PHP">

CheckFormParameters(array("id"));

$id = $_GET['id'];

$conn = new Connection;
$conn->Open();

$sql = " select " .
       "    id," .
       "    pai_nome," .
       "    pai_fone," .
       "    pai_profissao," .
       "    pai_instrucao," .
       "    pai_loc_trabalho," .
       "    mae_nome," .
       "    mae_fone," .
       "    mae_profissao," .
       "    mae_instrucao," .
       "    mae_loc_trabalho" .
       " from filiacao where id = $id;";

$query = $conn->CreateQuery($sql);

SaguAssert($query && $query->MoveNext(),"Registro não encontrado!");

list ( $id,
    $pai_nome,
    $pai_fone,
    $pai_profissao,
    $pai_instrucao,
    $pai_loc_trabalho,
    $mae_nome,
    $mae_fone,
    $mae_profissao,
    $mae_instrucao,
    $mae_loc_trabalho) = $query->GetRowValues();

$query->Close();

$conn->Close();
        </script>
    </head>
    <body bgcolor="#FFFFFF">
        <form method="post" action="post/filiacao_edita.php" name="myform">
            <table width="90%" align="center">
                <tr>
                    <td bgcolor="#000099" colspan="2" height="35">
                        <div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif" color="#CCCCFF"><b>&nbsp;Atualiza&ccedil;&atilde;o de Filia&ccedil;&atilde;o</b></font></div>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Nome do Pai</font></td>
                    <td>
                        <input name="pai_nome" type=text value="<?echo($pai_nome);?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Telefone do Pai</font></td>
                    <td>
                        <input name="pai_fone" type=text value="<?echo($pai_fone);?>" size="15">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Profiss&atilde;o do Pai</font></td>
                    <td>
                        <input name="pai_profissao" type=text value="<?echo($pai_profissao);?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Grau de Instru&ccedil;&atilde;o do Pai</font></td>
                    <td>
                        <input name="pai_instrucao" type=text value="<?echo($pai_instrucao);?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Local de Trabalho do Pai</font></td>
                    <td>
                        <input name="pai_loc_trabalho" type=text value="<?echo($pai_loc_trabalho);?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Nome da Mãe</font></td>
                    <td>
                        <input name="mae_nome" type=text value="<?echo($mae_nome);?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Telefone da Mãe</font></td>
                    <td>
                        <input name="mae_fone" type=text value="<?echo($mae_fone);?>" size="15">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Profiss&atilde;o da Mãe</font></td>
                    <td>
                        <input name="mae_profissao" type=text value="<?echo($mae_profissao);?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Grau de Instru&ccedil;&atilde;o da Mãe</font></td>
                    <td>
                        <input name="mae_instrucao" type=text value="<?echo($mae_instrucao);?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Local de Trabalho da Mãe</font></td>
                    <td>
                        <input name="mae_loc_trabalho" type=text value="<?echo($mae_loc_trabalho);?>" size="30">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr size="1">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div align="center">
                            <input type="hidden" name="id"       value="<?echo($id)?>">
                            <input type="submit" name="Submit"   value=" Salvar ">
                            <input type="button" name="Submit22" value=" Voltar " onclick="javascript:window.close()">
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
