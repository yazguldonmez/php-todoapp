<?php
if (get_session('login') && get_session('login') == true) redirect('home');
if (route(0) == 'login') {
    $_SESSION['post'] = $_POST;
    if (isset($_POST['submit'])) {
        $eposta = post('eposta');
        $sifre = post('sifre');

        $return = model('auth/login', ['email' => $eposta, 'password' => $sifre], 'login');

        if ($return['success'] == true) {
            $session = add_session('error', [
                'message' => $return['message'] ?? '',
                'type' => $return['type'] ?? ''
            ]);
            if (isset($return['redirect'])) {
                redirect($return['redirect']);
            }
        } else {
            $session = add_session('error', [
                'message' => $return['message'] ?? '',
                'type' => $return['type'] ?? ''
            ]);
        }
    }
    view('auth/login');
}
