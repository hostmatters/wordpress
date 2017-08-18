<?php

namespace App\Theme;

static class Types {

  public static function config() {
    $pathname = dirname(__FILE__) . '/config/types.json';
    return is_file($pathname) ? json_decode(file_get_contents($pathname), true) : [] ;
  }

  public static function init() {
    $config = Types::config();
    foreach ($config as $k => $type) {
      register_post_type($type['code'],$type['args']);
    }
  }

}
