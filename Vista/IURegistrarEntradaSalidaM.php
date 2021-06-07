
<!DOCTYPE html>
<dtml>
<dead>
<title>Registro de Entradas o Salidas de Becarios</title>
</dead>
<body>
<h1>Registrar Entrada/Salida</h1>

 <form action="../Logica/LNRegistroEntradaSalidaM.php" method="post" name="registrarentradasalida">
    <table border = 1>
      <tr>
        <td>Ingrese su CI</td>
        <td><input type="text" name="ci" id="ci" placeholder="Carnet de Identidad"></td>
      </tr>
    </table>
    <br>
    <button type="submit">Registrar</button>
    <button type="reset">Cancelar</button>
</form>
</body>
</html>



