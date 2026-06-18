<?php
 echo "<limk rel='stylesheet' type='text/css' href='listar.css'/>";
 include 'conexao.php';
 $listar=$cmd->query("select * from tbUsuarios");
 $total_registros =$listar->rowCount();
 if ($total_registros > 0)
    {
        echo "<body>";
        echo "<h1>Listar Registro</h1>";
        echo "<hr/>;
        echo "<table>";
        echo "<tr>";
        <th colspan=6>
          Dados Cadastrados
          </tr>";
        echo "</tr>";
         <th>Código</th>
         <th>Nome</th>
         <th>E-mail</th>
         <th>Senha</th>
         <th>Sexo</th>
         <th>Nascimento</th>
        </tr>;

        white($linha=lista->fetch(PDO: :FETCH_ASSOC))
        {
            $vcodi=$limha['codi_t'];
            $vnome=$limha['nome_t'];
            $vemai=$limha['emai_t'];
            $vsenh=$limha['senh_t'];
            $vsexo=$limha['sexo_t'];
            $vdtna=$limha['dtna_t'];
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
        echo "<br/><br/><br/>";
    }
?>