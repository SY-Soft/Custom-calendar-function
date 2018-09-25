<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Custom calendar function</title>
</head>
<body>
<?php
include_once('function.php');
if(isset($_POST['submit'])) {
    $def_year=$_POST['year'];
    $def_month=$_POST['month'];
    $def_day=$_POST['day'];
}else{
    $def_year=2013;
    $def_month=11;
    $def_day=17;
}
if($def_month/2==floor($def_month/2) && $def_day>DAY_IN_MONTH)
{
    $def_day=DAY_IN_MONTH;
    $message='Ошибка даты. Поправили.';
}
else $message="День недели для $def_day/$def_month/$def_year = ".get_dayweek($def_year,$def_month,$def_day);


?>
<div style="border: 1px double green; margin: 10px;padding: 10px;width: 100%;"><?=$message?></div>
<form id="form" name="form" method="post" action="">
    <label for="year"> Год </label>
    <select name="year" id="year">
        <?php
        for($i=START_YEAR;$i<=(int) date("Y");$i++) echo "<option ".($i==$def_year?'selected="selected"':'')." value=\"$i\">$i</option>";
        ?>
    </select>
    <label for="month"> Месяц </label>
    <select name="month" id="month">
        <?php
        for($i=1;$i<=YEAR_MONTHS;$i++) echo "<option ".($i==$def_month?'selected="selected"':'')." value=\"$i\">$i</option>"
        ?>
    </select>
    <label for="day"> День </label>
    <select name="day" id="day">
        <?php
        for($i=1;$i<=DAY_IN_MONTH+DAY_IN_MONTH_DIFFERENCE;$i++) echo "<option ".($i==$def_day?'selected="selected"':'')." value=\"$i\">$i</option>"
        ?>
    </select>
    <input type="submit" name="submit" id="button" value="Отправить" />
</form>


</body>
</html>
