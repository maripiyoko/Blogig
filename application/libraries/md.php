<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

set_include_path(APPPATH . 'third_party/' . PATH_SEPARATOR . get_include_path());

require_once APPPATH . 'third_party/Md/MarkdownInterface.php';
require_once APPPATH . 'third_party/Md/Markdown.php';
require_once APPPATH . 'third_party/Md/MarkdownExtra.php';

class Md extends Michelf\MarkdownExtra {
    function __construct($params = array()) {
        parent::__construct();
    }
}
