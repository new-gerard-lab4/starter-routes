<?php

/**
 * Created by PhpStorm.
 * User: gerard
 * Date: 2016-09-30
 * Time: 10:56 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Bingo extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // display page body
        $this->data['pagebody'] = 'justone';

        // get the 5th author
        $record = $this->quotes->get(5);
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

}