<?php
namespace App\Forms;

use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class NoticiaForm extends Form
{

    public function initialize()
    {
        //csrf
        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical([
            'value' => $this->security->getSessionToken(),
            'message' => 'Sem autorização!',
        ]));
        $this->add($csrf);

        //titulo
        $titulo = new Text("titulo");
        $titulo->addValidator(new PresenceOf(array(
            'message' => 'Campo Titulo é obrigatório',
        )));
        $titulo->addValidator(new StringLength(array(
            'max' => 255,
            'messageMaximum' => 'Campo titulo excede o limite maximo de 255 caracteres',
        )));
        $titulo->setAttribute('class', 'form-control');
        $this->add($titulo);

        //texto
        $this->add(new TextArea('texto', array("class" => "form-control tinymce-editor")));

        //id
        $this->add(new Hidden('id'));

        //categotia
        $categoria = new Select('categorias[]', array('Ciência e tecnologia' => 'Ciência e tecnologia', 'Desastres e acidentes‎' => 'Desastres e acidentes‎', 'Economia e negócios' => 'Economia e negócios', 'Educação' => 'Educação', 'Feiras e eventos' => 'Feiras e eventos'), array(
            'multiple' => true,
            "class" => "form-control tinymce-editor",
            "id" => "exampleFormControlSelect2",
        ));
        $this->add($categoria);

        //publicação
        $publicado = (new Check('publicado', ['value' => '1']))
            ->setDefault('0')
            ->addFilter('bool');
        $this->add($publicado);

        //data
        $this->add(new Text('data', array("class" => "form-control","id" => "data2")));

    }
}
