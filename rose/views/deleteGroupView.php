<?php
    include_once('models/groupModel.php');
    include_once('groupController.php');
    class DeleteGroupView{
        private $model;

        public function __construct(){
            $s = file_get_contents('cache/g'.$_SESSION['userid']);
            $this->model = unserialize($s);
        }

        public function getModel(){
            return $this->model;
        }
    }
    $deleteView = new DeleteGroupView();
    $deleteModel = $deleteView->getModel();
?>
<form method="post">
 <table>
    <caption><strong><p>Czy na pewno chcesz usunąć grupę o identyfikatorze <?php echo $deleteModel->getName();?>?</p></strong></caption>
    <tr><td colspan="2" style="text-align: center;" >
        <button class="actionbutton" name="submitted" type="submit">Usuń</button>
        <button class="actionbutton" name="cancel" type="cancel" formaction="index.php?view=groupListView">Anuluj</button></td></tr>
</table>
<div class="msg">
    <?php
        if(isset($_POST["submitted"])){
            echo GroupController::deleteGroup($deleteModel); 
            echo "<p><a href='index.php?view=groupListView'>Wróć</a></p>";
        }
    ?>   
</div>
</form>
