<h1>Blog Articles</h1>
<?= $this->html->link('Add Article', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Category</th>
        <th>Created</th>
    </tr>
    <?php foreach ($articles as $article) : ?>
        <tr>
            <td><?= $article->id ?></td>
            <td><?= $this->html->link($article->title, ['action' => 'view', $article->id]) ?></td>
            <td><?= $this->html->link($article->category->name, ['action' => 'index', $article->category_id]) ?></td>
            <td><?= $article->created ?></td>
            <td><?= $this->Form->postLink('delete', ['action' => 'delete', $article->id], ['confirm' => '本当に削除してもよろしいですか。']) ?></td>
            <td><?= $this->html->link('edit', ['action' => 'edit', $article->id]) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
