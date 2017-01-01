<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Video'), ['action' => 'edit', $video->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Video'), ['action' => 'delete', $video->id], ['confirm' => __('Are you sure you want to delete # {0}?', $video->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Videos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Video'), ['action' => 'add']) ?> </li>
    </ul> 
</nav>-->
<div class="videos view large-12 medium-12 columns content">
    <h3><?= h($video->name) ?></h3>
<!--     <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($video->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($video->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($video->id) ?></td>
        </tr>

    </table> -->
<!--     <video style="width:100%; height:auto" controls>
        <source src="~/uploads/0da93d95c25490e01fdd041e4e6f137c19a96e93.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <?=  WWW_ROOT . h($video->url) ;?> -->


<?= $this->Html->media(
     ['/uploads/'.h($video->url), ['src' => '/uploads/'. h($video->url), 'type' => "video/mp4"], ['src' => '/uploads/'. h($video->url), 'type' => "video/webm"]],
     ['controls' , 'style' => 'width:80%;height:auto;margin-left:10%;']
 ) ?>

</div>
