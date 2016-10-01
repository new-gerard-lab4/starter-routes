<?php

/**
 * Created by PhpStorm.
 * User: gerard
 * Date: 2016-09-30
 * Time: 11:20 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Wise extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    public function bingo()
    {
        // display page body
        $this->data['pagebody'] = 'justone';

        // get the 6th author
        $record = $this->quotes->get(6);
        $this->data = array_merge($this->data, $record);

        $this->render();
    }
}