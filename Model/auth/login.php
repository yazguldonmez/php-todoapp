<?php

if ($process == 'login') {

    if (!$data['email']) {
        return [
            'success' => false,
            'message' => 'Lütfen e posta adresinizi girin',
            'type' => 'danger'
        ];
    }
    if (!$data['password']) {
        return [
            'success' => false,
            'message' => 'Lütfen şifrenizi girin',
            'type' => 'danger'
        ];
    }

    $email = $data['email'];
    $password = md5($data['password']);
    $q = $db->prepare("SELECT *, CONCAT(name,' ',surname) as fullname FROM users WHERE email=? && password=?");
    $islem = $q->execute([$email, $password]);
    if ($q->rowCount()) {
        $user = $q->fetch(PDO::FETCH_ASSOC);
        add_session('id', $user['id']);
        add_session('name', $user['name']);
        add_session('surname', $user['surname']);
        add_session('fullname', $user['fullname']);
        add_session('login', true);

        return [
            'success' => true,
            'message' => 'Giriş Başarılı',
            'data' => $user,
            'type' => 'success',
            'redirect' => 'home'
        ];
    } else {
        return [
            'success' => false,
            'message' => 'E-postanız veya şifreniz hatalıdır',
            'type' => 'danger'
        ];
    }
}
