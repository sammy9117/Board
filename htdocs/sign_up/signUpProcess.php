<?php
$conn = mysqli_connect('localhost', 'root', "ehdro1917", "board_project", "3308");
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
echo $hashedPassword;
$sql = "
    INSERT INTO user_db
    (email, password, created)
    VALUES('{$_POST['email']}', '{$hashedPassword}', NOW()
    )";
echo $sql;
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($conn);
} else {
?>
    <script>
        alert("회원가입이 완료됐습니다.");
        location.href = "index.php";
    </script>
<?php
}
?>