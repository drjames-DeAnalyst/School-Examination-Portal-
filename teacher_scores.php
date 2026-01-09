<?php include "../config/db.php"; ?>
<?php
$student = $_GET['student'];

if(isset($_POST['save'])){
    $total = $_POST['t1'] + $_POST['t2'] + $_POST['exam'];

    if($total >=70) $grade='A';
    elseif($total >=60) $grade='B';
    elseif($total >=50) $grade='C';
    elseif($total >=45) $grade='D';
    else $grade='F';

    $conn->query("INSERT INTO scores(student_id,subject_id,first_test,second_test,exam,total,grade,term_id,session_id)
    VALUES('$student','{$_POST['subject']}','{$_POST['t1']}','{$_POST['t2']}','{$_POST['exam']}','$total','$grade',1,1)");
}
?>

<form method="post">
<select name="subject">
<?php
$res=$conn->query("SELECT * FROM subjects");
while($s=$res->fetch_assoc()){
echo "<option value='{$s['id']}'>{$s['subject_name']}</option>";
}
?>
</select><br>

<input name="t1" placeholder="1st Test (15)" required><br>
<input name="t2" placeholder="2nd Test (15)" required><br>
<input name="exam" placeholder="Exam (70)" required><br>

<button name="save">Save Score</button>
</form>