
<div class="card bg-person">
  <div class="card-header">
    Chat
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-person">
      <?php 
      $read = new Read();
      $read->getChat('WHERE ch.de = '.Url::getURL(1).' AND ch.para = '.$_SESSION['userId'].'');
      foreach($read->getResult() as $chat):
        extract($chat);
      ?> 
        <div class="alert alert-success" role="alert">
          <span class="badge badge-pill badge-secondary"> <i class="fas fa-comments"></i> <?php echo Validation::getNameUser(Url::getURL(1)) ?></span>
          <?php echo $msg?>
        </div>
      <?php endforeach ?>
      <?php 
      $read = new Read();
      $read->getChat('WHERE ch.de = '.$_SESSION['userId'].' AND ch.para = '.Url::getURL(1).'');
      foreach($read->getResult() as $chat):
        extract($chat);
      ?> 
        <div class="alert alert-dark" role="alert">
          <span class="badge badge-pill badge-success"> <i class="fas fa-comments"></i> <?php echo Validation::getNameUser($_SESSION['userId']) ?></span>
          <?php echo $msg?>
        </div>
      <?php endforeach ?>
    </li>
    <li class="list-group-item bg-person">
    <?php 
        if ($_POST && ($_POST['typeForm'] == 'chat')):
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            unset($dados['typeForm']);
            $create = new Create();
            $create->ExeCreate('chat', $dados);
            if($create->getResult()){
                echo '<script>location.href="./'.Url::getURL(1).'";</script>';
                unset($dados);
            }
            
        endif
    ?>
      <form action="" method="post">
        <input type="hidden" name="typeForm" value="chat">
        <input type="hidden" name="para" value="<?php echo Url::getURL(1) ?>">
        <input type="hidden" name="de" value="<?php echo $_SESSION['userId'] ?>">
        <textarea class="form-control" name="msg" rows="2"></textarea><br>
        <button class="btn btn-outline-success">Enviar</button>
      </form>
    </li>
  </ul>
</div>
