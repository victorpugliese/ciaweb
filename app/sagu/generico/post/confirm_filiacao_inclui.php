<? 

require("../../common.php"); 

$id               = $_POST['id'];
$pai_nome         = $_POST['pai_nome'];
$pai_fone         = $_POST['pai_fone'];
$pai_profissao    = $_POST['pai_profissao'];
$pai_instrucao    = $_POST['pai_instrucao'];
$pai_loc_trabalho = $_POST['pai_loc_trabalho'];
$mae_nome         = $_POST['mae_nome'];
$mae_fone         = $_POST['mae_fone'];
$mae_profissao    = $_POST['mae_profissao'];
$mae_instrucao    = $_POST['mae_instrucao'];
$mae_loc_trabalho = $_POST['mae_loc_trabalho'];

?>
<html>
    <head>
    <title>Inclusão de Filiação</title></head>
    <?php 

SaguAssert($pai_nome || $mae_nome, "É necessário informar pelo menos o nome do pai ou da mãe!!!");

    ?>
    <body bgcolor="#FFFFFF" marginwidth="20" marginheight="20">
        <form method="post" action="filiacao_inclui.php" name="myform">
            <table width="90%" align="center">
                <tr bgcolor="#000099">
                    <td colspan="2" height="35">
                        <div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#CCCCFF">Confirme a Opera&ccedil;&atilde;o</font></b></font><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><b></b></font></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height="49" valign="bottom">
                        <div align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="3"><b>Incluir Filia&ccedil;&atilde;o</b></font> </div>
                        <hr size="1">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Verifique se os dados est&atilde;o corretos.</font></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#EFEFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Nome do Pai</font></td>
                    <td bgcolor="#FFFFEF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b>
                                <script language="PHP">echo($pai_nome);</script>
                    &nbsp; </b></font></td>
                </tr>
                <tr>
                    <td bgcolor="#EFEFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Telefone do Pai</font></td>
                    <td bgcolor="#FFFFEF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b>
                                <script language="PHP">echo($pai_fone);</script>
                    &nbsp; </b></font></td>
                </tr>
                <tr>
                    <td bgcolor="#EFEFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Profiss&atilde;o do Pai</font></td>
                    <td bgcolor="#FFFFEF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b>
                                <script language="PHP">echo($pai_profissao);</script>
                    &nbsp; </b></font></td>
                </tr>
                <tr>
                    <td bgcolor="#EFEFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Grau de instru&ccedil;&atilde;o do Pai</font></td>
                    <td bgcolor="#FFFFEF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b>
                                <script language="PHP">echo($pai_instrucao);</script>
                    &nbsp; </b></font></td>
                </tr>
                <tr>
                    <td bgcolor="#EFEFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Local de trabalho Pai</font></td>
                    <td bgcolor="#FFFFEF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b>
                                <script language="PHP">echo($pai_loc_trabalho);</script>
                    &nbsp; </b></font></td>
                </tr>
                <tr>
                    <td bgcolor="#EFEFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Nome da M&atilde;e</font></td>
                    <td bgcolor="#FFFFEF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b>
                                <script language="PHP">echo($mae_nome);</script>
                    &nbsp; </b></font></td>
                </tr>
                <tr>
                    <td bgcolor="#EFEFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Telefone da M&atilde;e</font></td>
                    <td bgcolor="#FFFFEF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b>
                                <script language="PHP">echo($mae_fone);</script>
                    &nbsp; </b></font></td>
                </tr>
                <tr>
                    <td bgcolor="#EFEFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Profissão da Mãe</font></td>
                    <td bgcolor="#FFFFEF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b>
                                <script language="PHP">echo($mae_profissao);</script>
                    &nbsp; </b></font></td>
                </tr>
                <tr>
                    <td bgcolor="#EFEFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Grau de instrução Mãe</font></td>
                    <td bgcolor="#FFFFEF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b>
                                <script language="PHP">echo($mae_instrucao);</script>
                    &nbsp; </b></font></td>
                </tr>
                <tr>
                    <td bgcolor="#EFEFFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">Local de trabalho M&atilde;e</font></td>
                    <td bgcolor="#FFFFEF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C"><b>
                                <script language="PHP">echo($mae_loc_trabalho);</script>
                    &nbsp; </b></font></td>
                </tr>
                <tr>
                    <td colspan="2" height="19">
                        <hr size="1">
                    </td>
                </tr>
                <tr>
                    <td height="0">
                        <input type="hidden" name="id" value="<?echo($id);?>">
                        <input type="hidden" name="pai_nome" value="<?echo($pai_nome);?>">
                        <input type="hidden" name="pai_fone" value="<?echo($pai_fone);?>">
                        <input type="hidden" name="pai_profissao" value="<?echo($pai_profissao);?>">
                        <input type="hidden" name="pai_instrucao" value="<?echo($pai_instrucao);?>">
                        <input type="hidden" name="pai_loc_trabalho" value="<?echo($pai_loc_trabalho);?>">
                        <input type="hidden" name="mae_nome" value="<?echo($mae_nome);?>">
                        <input type="hidden" name="mae_fone" value="<?echo($mae_fone);?>">
                        <input type="hidden" name="mae_profissao" value="<?echo($mae_profissao);?>">
                        <input type="hidden" name="mae_instrucao" value="<?echo($mae_instrucao);?>">
                        <input type="hidden" name="mae_loc_trabalho" value="<?echo($mae_loc_trabalho);?>">
                    </td>
                    <td height="0">&nbsp; </td>
                </tr>
                <tr>
                    <td colspan="2" height="19">
                        <div align="center">
                            <input type="submit" name="Submit"  value="  Salvar  ">
                            <input type="button" name="Submit2" value=" Alterar " onClick="javascript:history.go(-1)">
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
