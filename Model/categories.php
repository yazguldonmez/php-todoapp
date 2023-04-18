<?php

if ($process == 'add') {

    if (!$data['title']) {
        return [
            'success' => false,
            'message' => 'Lütfen Kategori Başlığı Giriniz',
            'type' => 'danger'
        ];
    }

    $title = $data['title'];

    $q = $db->prepare("INSERT INTO categories SET title=?, user_id=?");
    $q->execute([$title, get_session('id')]); //

    if ($q->rowCount()) {

        return [
            'success' => true,
            'message' => 'Kategori ekleme başarılı',
            'type' => 'success',
            'redirect' => 'categories/list'
        ];
    } else {
        return [
            'success' => false,
            'message' => 'Kategori eklenirken bir hata meydana geldi',
            'type' => 'danger',
            'data' => []
        ];
    }
} 
else if ($process == 'list') {
    $q = $db->prepare('SELECT * FROM categories WHERE user_id=?');
    $q->execute([get_session('id')]);
    if ($q->rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'data' => $q->fetchAll(PDO::FETCH_ASSOC)
        ];
    } else {
        return [
            'success' => false,
            'type' => 'success',
            'data' => []
        ];
    }
} 
else if ($process == 'getsingle') {
    $id = $data['id'];
    $q = $db->prepare('SELECT * FROM categories WHERE categories.id = ? && user_id = ?');
    $q->execute([$id, get_session('id')]);
    if ($q->rowCount()) {
        return [
            'success' => true,
            'type' => 'success',
            'data' => $q->fetch(PDO::FETCH_ASSOC)
        ];
    } else {
        return [
            'success' => false,
            'type' => 'danger'
        ];
    }
} 
else if ($process == 'edit') {
    $title = $data['title'];
    $id = $data['id'];
    $q = $db->prepare('UPDATE categories SET categories.title = ? WHERE categories.id = ? && user_id = ?');
    $q->execute([$title,$id, get_session('id') ]);
    if ($q->rowCount()) {$cat = $q->fetch(PDO::FETCH_ASSOC);
        return [
            'success' => true,
            'type' => 'success',
            'data' => $q->fetch(PDO::FETCH_ASSOC),
            'redirect' => 'categories/list'
        ];
    } else {
        return [
            'success' => false,
            'type' => 'danger',
            'message' => 'Kategori güncellenirken bir hata oluştu'
        ];
    }
} 
else if ($process == 'remove') {
    $id = $data['id'];
    $q = $db->prepare("DELETE FROM categories WHERE categories.id=? && user_id=?");
    $q->execute([$id, get_session('id')]); //
    if ($q->rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'message' => 'Silme Başarılı'
        ];
    } else {
        return [
            'success' => false,
            'type' => 'danger',
            'message' => 'Bir hata oluştu Lütfen Tekrar deneyin'
        ];
    }
}
