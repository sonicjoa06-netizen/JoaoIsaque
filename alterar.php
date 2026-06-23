<!doctype HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Alterar Registros</title>
        <link rel="stylesheet" type="text/css" href="misto.css"/>
		<script language="JavaScript">
		function Saindo()
		{
			location.href="index.html";
		}
		</script>
	</head>
    <body>
        <h1>Alterar Registros</h1>
        <hr/>
        <form method="post" action="alterar.php">             
            Código do registro a ser alterado&nbsp;                 
            <input type="text" name="txtcodi" id="txtcodi" style="width:8%"/><br/>
            <br/>
            Nome&nbsp;                 
            <input type="text" name="txtnome" id="txtnome" maxlenght="40" disabled/>&nbsp;&nbsp;
            <br/><br/>
            e-Mail&nbsp;                
            <input type="email" name="txtemai" id="txtemai" maxlenght="40" disabled/>&nbsp;&nbsp;
            <br/><br/>
            Senha&nbsp;                
            <input type="password" name="txtsenh" id="txtsenh" maxlenght="8" disabled/>&nbsp;&nbsp;
            <br/><br/>
            Sexo&nbsp;                
                <input type="radio" value="F" name="txtsexo" id="txtsexoF"/>F
			    <input type="radio" value="M" name="txtsexo" id="txtsexoM"/>M
            <br/><br/>
            Nascimento&nbsp;
            <input type="date" name="txtdtna" id="txtdtna" disabled/>&nbsp;&nbsp;
            <br/><br/>
            <input type="submit" name="bt" id="bt" value="Consultar"/>&nbsp;&nbsp; 
            <input type="button" value="Menu" onClick="Saindo()"/>
        </form>
        
        <?php 
            //estabelecendo a conexão com banco de dados 
            include 'conexao.php';
            $listar=$conex->query("select * from tbUsuarios");
			$total_registros =$listar->rowCount();
            if ($total_registros > 0)
	        {
                echo "<table>";
                echo "<tr>
                        <th colspan=6>Dados Cadastrados</th>
                      </tr>";
                echo "<tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Senha</th>
                        <th>Sexo</th>
                        <th>Nascimento</th>
                     </tr>";
				
                while($linha=$listar->fetch(PDO::FETCH_ASSOC))
                {
                    $vcodi=$linha['codi_cr'];
                    $vnome=$linha['nome_cr'];
                    $vemai=$linha['email_cr'];
                    $vsenh=$linha['senha_cr'];
			        $vsexo=$linha['sexo_cr'];
                    $vdtna=$linha['dtna_cr'];
                    echo "<tr>
                            <td>$vcodi</td>
                            <td>$vnome</td>
                            <td>$vemai</td>
                            <td>$vsenh</td>
                            <td>$vsexo</td>
   		                    <td>$vdtna</td>          
                          </tr>";
		        }
	            echo "</table>";
				
			}
            else
            {
                echo "<script language=javascript> alert('Não existem registros para serem alterados!!!'); history.back();</script>";
            }
                
            //recebendo os valores preenchidos nos campos do formulário nas variáveis do PHP
            if (isset($_POST['bt']))
            {
                $vcodi=$_POST['txtcodi']; 
                $vbt=$_POST['bt'];            
       
                if ($vbt=='Consultar')
                { 
                    //verificando se o código escolhido EXISTE                 
                    $pesq=$conex->query("select * from tbUsuarios where codi_cr='$vcodi'");
                    $total_registros =$pesq->rowCount();
                    if ($total_registros > 0) //achou o código escolhido, vamos devolver os dados para a tela
                    {
                        while($linha=$pesq->fetch(PDO::FETCH_ASSOC))
                        {
                            $vcodi=$linha['codi_cr'];
                            $vnome=$linha['nome_cr'];
        				    $vemai=$linha['email_cr'];
                            $vsenh=$linha['senha_cr'];
					        $vsexo=$linha['sexo_cr'];
                            $vdtna=$linha['dtna_cr']; 
      		                echo "<script language=javascript>
                                    document.getElementById('txtcodi').value='$vcodi';
                                    
                                    document.getElementById('txtnome').disabled = false;
                                    document.getElementById('txtnome').value='$vnome';
                                    
                                    document.getElementById('txtemai').disabled = false;
                                    document.getElementById('txtemai').value='$vemai';
                                    
                                    document.getElementById('txtsenh').disabled = false;
                                    document.getElementById('txtsenh').value='$vsenh';
                                    
                                    if ('$vsexo' == 'F')
    		                            document.getElementById('txtsexoF').checked=true;
                                    else
    		                            document.getElementById('txtsexoM').checked=true;
                                    
                                    document.getElementById('txtdtna').disabled = false;
                                    document.getElementById('txtdtna').value='$vdtna';
                                    
                                    document.getElementById('bt').value='Alterar';
                                    
                              </script>";
				        }
                    }
			    else
			        {
                        echo "<script language=javascript> alert('Código inexistente!!!'); </script>";
                        echo "<meta http-equiv='refresh' content='0' />"; 
                    }
                }

                else if ($vbt=='Alterar')
                { 
                    $vcodi=$_POST['txtcodi']; 
                    $vnome=$_POST['txtnome']; 
			        $vemai=$_POST['txtemai'];
			        $vsenh=$_POST['txtsenh'];
			        $vsexo=$_POST['txtsexo'];
                    $vdtna=$_POST['txtdtna'];      
                    //atualizando o registro com os novos valores 
                    $alter=$conex->query("update tbUsuarios set nome_cr='$vnome', email_cr='$vemai', senha_cr='$vsenh', sexo_cr='$vsexo', dtna_cr='$vdtna' where codi_cr='$vcodi'");
		            echo "<script language=javascript>
                            alert('Registro alterado com sucesso!!! '); 
                            document.getElementById('bt').value='Consultar';
                            document.getElementById('txtcodi').readOnly= false;
                         </script>";
                    echo "<meta http-equiv='refresh' content='0' />"; 
		        }
            }              		
 	    ?>
	</body>
</html>