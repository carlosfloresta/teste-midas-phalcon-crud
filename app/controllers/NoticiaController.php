<?php

use App\Forms\NoticiaForm;

class NoticiaController extends ControllerBase
{

    private $mensagemDeErro = '';

    public function listaAction()
    {
        $noticias = Noticia::find();
        $this->view->noticias = $noticias;
        $this->view->pick("noticia/listar");
    }

    public function cadastrarAction()
    {
        $form = new NoticiaForm();
        $this->view->pick("noticia/cadastrar");
        $this->view->form = $form;
    }

    public function editarAction($id)
    {
        $form = new NoticiaForm();
        $this->view->form = $form;
        $noticias = Noticia::findFirstById($id);

        $arraycategoria = explode(",", $noticias->categoria);

        foreach ($arraycategoria as $key => $value) {

            $this->tag->setDefault("categorias[]", $value);

        }

        /*       var_dump();
        die();     */
        $this->view->noticia = $noticias;
        $this->view->pick("noticia/editar");
    }

    public function salvarAction()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $titulo = $this->request->getPost('titulo');
        $texto = $this->request->getPost('texto');
        $categoria = $this->request->getPost('categorias');
        $publicado = $this->request->getPost('publicado');
        $id = $this->request->getPost("id");

        $noticias = Noticia::findFirstById($id);

        /*    var_dump($publicado);
        die();   */

        $form = new NoticiaForm();
        $noticia = new Noticia();

        if ($publicado == 1) {
            $publicado = 'SIM';
            $data_pub = $this->request->getPost('data');
        } else {
            $publicado = 'NÃO';
            $data_pub = null;
        }

        $noticia->setTitulo($titulo);
        $noticia->setTexto($texto);
        $noticia->setCategoria(implode(",", $categoria));
        $noticia->setPublicado($publicado);
        $noticia->setDataCad(date('Y-m-d H:i:s'));
        $noticia->setDataUlt(date('Y-m-d H:i:s'));
        $noticia->setDataP($data_pub);

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {

                if ($noticias) {
                    //update
                    $noticias->setTitulo($titulo);
                    $noticias->setTexto($texto);
                    $noticias->setCategoria(implode(",", $categoria));
                    $noticias->setPublicado($publicado);
                    $noticias->setDataP($data_pub);
                    $noticias->setDataUlt(date('Y-m-d H:i:s'));

                    if ($noticias->save()) {
                        $this->flash->success('Noticia atualizada com sucesso!');
                        return $this->response->redirect(array('for' => 'noticia.lista'));
                    } else {
                        $this->flash->error('Erro ao atualizar noticia!');
                        return $this->response->redirect(array('for' => 'noticia.editar'));
                    }
                } elseif ($noticia->create()) {
                    //create
                    $this->flash->success('Noticia cadastrada com sucesso!');
                    return $this->response->redirect(array('for' => 'noticia.lista'));

                } else {

                    $this->flash->error('Erro ao salvar noticia!');
                    return $this->response->redirect(array('for' => 'noticia.cadastrar'));
                }

            } else {
                foreach ($form->getMessages() as $message) {

                    $this->flash->error($message);
                    $this->session->set('titulo', $titulo);
                    $this->session->set('texto', $texto);
                    if ($noticias) {
                        return $this->response->redirect(array('for' => 'noticia.editar', 'id' => $id));
                    }
                    return $this->response->redirect(array('for' => 'noticia.cadastrar'));
                }

            }
        }
    }

    public function excluirAction($id)
    {
        $noticias = Noticia::findFirstById($id);
        if (!$noticias) {
            $this->flash->error("ID não encontrado!");
            return $this->response->redirect(array('for' => 'noticia.lista'));
        }
        if (!$noticias->delete()) {
            foreach ($noticias->getMessages() as $msg) {
                $this->flash->error((string) $msg);
            }
            return $this->response->redirect(array('for' => 'noticia.lista'));
        }
        $this->flash->success('Noticia apagada com sucesso!');
        return $this->response->redirect(array('for' => 'noticia.lista'));
    }
}
