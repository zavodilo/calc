<?php
// Обработчик присланных данных
if ($_GET['action'] && is_numeric($_GET['x']) && is_numeric($_GET['y'])) {
    //Для удобства переписываем значения полей присланной формы в простые переменные.
    $action = $_GET['action'];
    $x = $_GET['x'];
    $y = $_GET['y'];
    $result = 0; //Это переменная для результата действия
    switch ($action) {
        case "+":
            $result = $x + $y;
            break;
        case "-":
            $result = $x - $y;
            break;
        case "*":
            $result = $x * $y;
            break;
        case "/":
            if ($y != 0) {
                $result = $x / $y;
            } else {
                $result = "деление на ноль";
            };
            break;
        case "^":
            $result = 1;
            for ($i = 0; $i < $y; $i++) {
                $result *= $x;
            };
            break;
        default:
            $result = "Неизвестное действие";
    }
}
?>

<html>
<head>
    <title>Калькулятор</title>
</head>
<body>
<?php
//Вывод результата
if (is_numeric($result)) {
    echo "{$x} {$action} {$y} = {$result}";
} elseif (is_string($result)) {
    echo $result;
}
?>
<form>
    Введите х: <input type=text name=x><br/>
    Введите у: <input type=text name=y><br/>
    Выберите действие:
    <select name=action>
        <option value="+">х+у</option>
        <option value="-">х-у</option>
        <option value="*">х*у</option>
        <option value="/">х/у</option>
        <option value="^">х^у</option>
    </select><br/>
    <input type=submit value="Посчитать">
</form>
</body>
</html>
