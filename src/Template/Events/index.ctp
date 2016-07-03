<?php
/* @var $this \Cake\View\View */
$this->extend('/Layout/twitterbootstrap/dashboard');
echo $this->element('calendar');
?>
<!-- FullCalendar Events Get URL -->
<div type="hidden"
     id="api-url"
     style="display:none;"
     data-val="<?= $this->url->build('/ajax/feed/'.$this->request->session()->read('Auth.User.id').'/', true); ?>">
</div>
