<?php
require('func/config.php');
// if($_POST['ParentOffice'])
// {
 $id="Office of the Governor";

 $stmt = $db->prepare("SELECT * FROM officedepartments WHERE ParentOffice=:ParentOffice");
 $stmt->execute(array(':ParentOffice' => $id));

 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
        <option value="<?php echo $row['DepartmentName']; ?>"><?php echo $row['DepartmentName']; ?></option>
        <?php
 }
// }
?>
