<?php

namespace App\Controller;

class ArticlesController extends AppController
{

    /**
     * index
     *
     * @return void
     * @author @TakehiroTada
     */
    public function index()
    {
        $articles = $this->Articles->find()->contain(['Categories'])->all();
        $this->set(compact('articles'));
    }

    public function view($id = null)
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('記事が保存されました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('記事が保存できませんでした'));
        }
        $this->set('article', $article);
        $categories = $this->Articles->Categories->find('treeList')->all();
        $this->set(compact('categories'));
    }

    public function edit($id)
    {
        $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('記事が更新されました'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(_('記事が更新できませんでした'));
        }
        $this->set(compact('article'));
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('ID:{0}の削除が完了しました。', h($id)));
            $this->redirect(['action' => 'index']);
        }
    }
}
