<?php
//
// Базовый контроллер
//
abstract class C_Base extends Controller
{
    protected $title;		// заголовок страницы
    protected $content;		// содержание страницы
    protected $alertSuccess;


    function __construct()
    {
        $this->title = 'Название сайта';
        $this->content = '';
    }

    //
    // Генерация базового шаблона
    //
    public function render()
    {
        $page = $this->Template('views/v_mainMain.php',array('title'=>$this->title,'content'=>$this->content,'alertSuccess'=>$this->alertSuccess));
        echo $page;
    }
    protected function before()
    {
        $this->title = 'Название сайта';
        $this->content = '';
    }
}

