<?php
session_start();
require dirname(__FILE__) . "/../config/usuarios.php";
function comprobar_usuario($usuarios,$nombre, $clave){

    $found = function() use ($usuarios,$nombre){
        $i = 0;
        foreach ($usuarios as $usuario){
            if ($usuario['usuario'] === $nombre) return $i;
            $i++;
        }
        return false;
    };
    $linea = $found();
    if ($linea === false) return false;
    if (hash('sha256',$clave) !== $usuarios[$linea]['password']) return false;
    return $linea;
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $usu = comprobar_usuario($usuarios,$_POST['usuario'], $_POST['clave']);
    if($usu===false){
        $err = true;
        $usuario = $_POST['usuario'];
    }else{
        $_SESSION['usuario'] = serialize($usuarios[$usu]);
        header("Location: index.php");
    }
}
require_once('../templates/header.php');
?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <?php if(isset($err) and $err == true){
            echo "<p>revise usuario y contraseña</p>";
        }?>
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
            User:
            <input value = "<?php if(isset($usuario))echo $usuario;?>"
                   id = "usuario" name = "usuario" type = "text">
            Password :
            <input id = "clave" name = "clave" type = "password">
            <input type = "submit">
        </form>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<?php
require_once ('../templates/footer.php');
?>