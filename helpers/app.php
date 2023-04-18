<?php
function route($index)
{
    global $config;
    if (isset($config['route'][$index])) return $config['route'][$index];
    else return false;
}

function view($viewName, $pageData = [])
{
    $data = $pageData;
    if (file_exists(BASEDIR . '/View/' . $viewName . '.php')) {
        require BASEDIR . '/View/' . $viewName . '.php';
    } else {
        return false;
    }
}

function assets($assetName)
{
    if (file_exists(BASEDIR . '/Public/' . $assetName)) {
        return URL . 'Public/' . $assetName;
    } else {
        return false;
    }
}

function Lang($text)
{
    global $lang;
    if (isset($lang[$text])) return $lang[$text];
    else return $text;
}

function add_session($index, $value)
{
    $_SESSION[$index] = $value;
}

function get_session($index)
{
    if (isset($_SESSION[$index])) return $_SESSION[$index];
    else return false;
}

function filter($field)
{
    return is_array($field)
        ? array_map('filter', $field)
        : htmlspecialchars(trim($field));
}

function post($index)
{
    if (isset($_POST[$index])) {
        return filter($_POST[$index]);
    } else {
        return false;
    }
}

function get($index)
{
    if (isset($_GET[$index])) {
        return filter($_GET[$index]);
    } else {
        return false;
    }
}

function model($modelName, $pageData = [], $data_Process = null)
{
    global $db;
    if ($data_Process != null) $process = $data_Process;
    $data = $pageData;
    if (file_exists(BASEDIR . '/Model/' . $modelName . '.php')) {
        $return = require BASEDIR . '/Model/' . $modelName . '.php';
        return $return;
    } else {
        return false;
    }
}

function redirect($link)
{
    header('Location:' . URL . $link);
}

function url($url)
{
    global $config;
    return URL . $config['lang'] . '/' . $url;
}
