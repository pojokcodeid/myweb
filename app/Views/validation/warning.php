<?php

function setErrorMsg($key, $field)
{
  if (session()->getFlashdata($key)) {
    if (isset(session()->getFlashdata($key)[$field]))
      echo session()->getFlashdata($key)[$field];
  }
}

function setErrorClass($key = '', $field = '')
{
  if (isset(session()->getFlashdata($key)[$field]))
    echo 'error';
}