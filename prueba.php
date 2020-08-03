<form method="post" action="">
    <span>Select languages</span><br/>
    <input type="checkbox" name='lang' value="PHP"> PHP <br/>
    <input type="date" name="fecha">

    <input type="submit" value="Submit" name="submit">
</form>

<?php
$qwe=0;
if(isset($_POST['submit'])){
    if(!empty($_POST['lang'])) {
       $qwe= $_POST['lang'];
    }
    echo $qwe;
    if(!empty($_POST['fecha'])){
        echo 'sin fecha';

    }

    echo Date('0000-00-00');
    
}
?>