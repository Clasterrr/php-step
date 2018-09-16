<?php


if (!isset($_SESSION['count'])) {
//    $_SESSION
}



if (!empty($_REQUEST['add_user']) && $db) {
    $userData = json_decode($_REQUEST['form_data'], true);
    $isExists = isUserExists($userData, $db);

    if ($isExists) {
        echo json_encode([
            'result' => false,
            'errors' => ['email']
        ]);
        return;
    }

    $sql = 'INSERT INTO Users (name, email, user, password)'
        .'VALUES (:name, :email, :user, :password)';

    $passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);

    $result = $db->prepare($sql);
    $result->bindParam(':name', $userData['name'], PDO::PARAM_STR);
    $result->bindParam(':email', $userData['email'], PDO::PARAM_STR);
    $result->bindParam(':user', $userData['user'], PDO::PARAM_STR);
    $result->bindParam(':password', $passwordHash, PDO::PARAM_STR);

    $responseResult = $result->execute();

    echo json_encode([
        'result' => (bool)$responseResult,
        'errors' => $responseResult ? [] : ['failed']
    ]);
    return;
}


if (!empty($_REQUEST['auth_user'] && db)) {

}

function isUserExists($userData , $connect) {
    $userEmail = $userData['email'];
    $sql = "SELECT id, name FROM Users WHERE email='".$userEmail."'";

    $response = $connect->query($sql, PDO::FETCH_ASSOC);

    $dataFromDatabase = array();
    $i = 0;
    while ($row = $response->fetch()){
        $dataFromDatabase[$i]['id'] = $row['id'];
        $dataFromDatabase[$i]['name'] = $row['name'];
        $i++;
    }

    return (bool)count($dataFromDatabase);
}
