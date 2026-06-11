<?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
<tr>
    <td><?php echo $linha["id"]; ?></td>
    <td><?php echo $linha["nome"]; ?></td>
    <td><?php echo $linha["email"]; ?></td>
    <td><?php echo $linha["senha"]; ?></td>
    <td>
        <a class="excluir"
           href="excluir.php?id=<?php echo $linha['id']; ?>"
           onclick="return confirm('Deseja realmente excluir este usuario?')">
           Excluir
        </a>
    </td>
</tr>
<?php } ?>