<?php
/**
 * Created by PhpStorm.
 * User: kwanc
 * Date: 2016-09-30
 * Time: 12:32 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Last extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->data['pagebody'] = 'justone';


        $record = $this->quotes->get(6);
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

}