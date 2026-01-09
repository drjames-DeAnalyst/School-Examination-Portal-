<?php
require 'config/db.php';
require 'vendor/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$student_id = $_GET['student'];
$term_id = $_GET['term'];
$session_id = $_GET['session'];

/* STUDENT INFO */
$s = $conn->query("
SELECT s.*, c.class_name 
FROM students s 
JOIN classes c ON s.class_id=c.id 
WHERE s.id=$student_id
")->fetch_assoc();

/* SCORES */
$scores = $conn->query("
SELECT sub.subject_name, sc.*
FROM scores sc 
JOIN subjects sub ON sc.subject_id=sub.id
WHERE sc.student_id=$student_id 
AND sc.term_id=$term_id 
AND sc.session_id=$session_id
");

/* ATTENDANCE */
$a = $conn->query("
SELECT * FROM attendance 
WHERE student_id=$student_id 
AND term_id=$term_id 
AND session_id=$session_id
")->fetch_assoc();

/* PSYCHOMOTOR */
$p = $conn->query("
SELECT * FROM psychomotor 
WHERE student_id=$student_id 
AND term_id=$term_id 
AND session_id=$session_id
")->fetch_assoc();

$total_score = 0;
$subjects = 0;

ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
    font-family:Arial;
    background:#FFD700;
}
table{
    width:100%;
    border-collapse:collapse;
}
td,th{
    border:1px solid #000;
    padding:5px;
    font-size:12px;
}
.header{
    text-align:center;
    color:#0033cc;
}
.watermark{
    position:fixed;
    top:40%;
    left:20%;
    opacity:0.1;
    font-size:60px;
    transform:rotate(-30deg);
}
</style>
</head>

<body>
<div class="watermark">TIMZY INTERNATIONAL EDUCATION CENTRE</div>

<div class="header">
<img src="logo.png" height="70"><br>
<b>TIMZY INTERNATIONAL EDUCATION CENTRE</b><br>
Ekpoma, Edo State<br>
<b>TERM RESULT</b>
</div>

<hr>

<table>
<tr>
<td><b>Name:</b> <?= $s['full_name'] ?></td>
<td><b>Gender:</b> <?= $s['gender'] ?></td>
<td><b>Class:</b> <?= $s['class_name'] ?></td>
<td rowspan="3"><img src="<?= $s['passport'] ?>" height="90"></td>
</tr>
<tr>
<td><b>Term:</b> <?= $term_id ?></td>
<td><b>Session:</b> <?= $session_id ?></td>
<td><b>Attendance:</b> <?= $a['days_present'] ?> days</td>
</tr>
</table>

<br>

<table>
<tr style="background:#ccc;">
<th>Subject</th>
<th>Test 1</th>
<th>Test 2</th>
<th>Exam</th>
<th>Total</th>
<th>Grade</th>
</tr>

<?php while($r=$scores->fetch_assoc()){
$total_score += $r['total'];
$subjects++;
?>
<tr>
<td><?= $r['subject_name'] ?></td>
<td><?= $r['first_test'] ?></td>
<td><?= $r['second_test'] ?></td>
<td><?= $r['exam'] ?></td>
<td><?= $r['total'] ?></td>
<td><?= $r['grade'] ?></td>
</tr>
<?php } ?>

</table>

<br>

<table>
<tr>
<td><b>Total Score:</b> <?= $total_score ?></td>
<td><b>Average:</b> <?= round($total_score/$subjects,2) ?></td>
</tr>
</table>

<br>

<table>
<tr style="background:#ccc;">
<th colspan="4">Psychomotor / Affective Domain</th>
</tr>
<tr>
<td>Neatness</td><td><?= $p['neatness'] ?></td>
<td>Punctuality</td><td><?= $p['punctuality'] ?></td>
</tr>
<tr>
<td>Honesty</td><td><?= $p['honesty'] ?></td>
<td>Leadership</td><td><?= $p['leadership'] ?></td>
</tr>
</table>

<br>

<table>
<tr>
<td><b>Class Teacher Remark:</b><br> Excellent performance</td>
</tr>
<tr>
<td><b>Principal Remark:</b><br> Keep it up</td>
</tr>
</table>

</body>
</html>

<?php
$html = ob_get_clean();

$pdf = new Dompdf();
$pdf->setPaper('A4','landscape');
$pdf->loadHtml($html);
$pdf->render();
$pdf->stream("result.pdf",["Attachment"=>false]);