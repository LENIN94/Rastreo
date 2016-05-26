<?php
/**
 * Created by PhpStorm.
 * User: OmarLenin
 * Date: 18/02/2016
 * Time: 03:43 PM
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Error404 extends CI_Controller {
    public function index(){
        $this->load->view('constant');
        $this->load->view('error404');
    }
}