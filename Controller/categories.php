<?php
if (!get_session('login') || get_session('login') != true) redirect('login');
if (route(0) == 'categories' && !route(1)) {
    view('categories/home');
} else if (route(0) == 'categories' && route(1) == 'add') {
    if (isset($_POST['submit'])) {
        $_SESSION['post'] = $_POST;

        $title = post('title');
        $return = model('categories', ['title' => $title], 'add');

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
    view('categories/add');
} else if (route(0) == 'categories' && route(1) == 'list') {
    $return = model('categories', [], 'list');
    view('categories/list', $return['data']);
} else if (route(0) == 'categories' && route(1) == 'edit' && is_numeric(route(2))) {
    if (isset($_POST['submit'])) {
        $_SESSION['post'] = $_POST;
        $id = post('id');
        $title = post('title');
        $return = model('categories', ['title' => $title, 'id' => $id], 'edit');
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
    $return = model('categories', ['id' => route(2)], 'getsingle');
    view('categories/edit', $return['data']);
} else if (route(0) == 'categories' && route(1) == 'remove' && is_numeric(route(2))) {
    $return = model('categories', ['id' => route(2)], 'remove');
    redirect('categories/list/?type=' . $return['type'] . '&message=' . $return['message']);
} else if (route(0) == 'todo' && route(1) == 'add') {
    view('todo/add');
}
