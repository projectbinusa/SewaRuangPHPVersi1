<?php
defined('BASEPATH') or exit('No direct script access allowed');

class datamasterruangan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper( 'my_helper' );
        }


}