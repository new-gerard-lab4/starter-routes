<?php
/**
 * Created by PhpStorm.
 * User: kwanc
 * Date: 2016-09-30
 * Time: 12:03 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class First extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->data['pagebody'] = 'justone';


        $record = $this->quotes->get(1);
        $this->data = array_merge($this->data, $record);

        $this->render();
    }
    public function zzz()
    {

        $this->data['pagebody'] = 'justone';


        $record = $this->quotes->get(1);

        $this->data['who'] = $record['who'];
        $this->data['mug'] = $record['mug'];
        $this->data['href'] = $record['where'];
        $this->data['what'] = $record['what'];

        $this->render();
    }
    public function gimme($id)
     {
         $this->data['pagebody'] = 'justone';

         $record = $this->quotes->get($id);

         $this->data['who'] = $record['who'];
         $this->data['mug'] = $record['mug'];
         $this->data['href'] = $record['where'];
         $this->data['what'] = $record['what'];

         $this->render();
     }

}