<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
?>

<div class="box box-success" style="position: relative; left: 0px; top: 0px;">
  <div class="box-header">
    <i class="fa fa-rocket"></i>
    <h3 class="box-title">WOTASUKE初版リリース</h3>
  </div>
  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;"><div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: auto;">
    <!-- chat item -->
    <div class="item">
      <?= $this->Html->image('thumbnail/cb884fa1da8163a1957d79870fdbb8ea.jpeg', ['class' => 'online']); ?>
      <p class="message">
        <a href="#" class="name">
          <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2016-07-08</small>
          しらき
        </a>
          WOTASUKE初版リリースしました！</br></br>
          楽しく自由に使ってもらえると嬉しいです。</br>
          「こんな機能欲しい」とか「使い勝手悪い」とかご意見あればいつでも管理人までどうぞ。</br>
          せっかくヲタに特化してるので「そんなのヲタしかつかわねーよｗｗｗ」な機能でも大歓迎ですぞ！
          </br></br>
          今後のリリースでは下記みたいなことを考えてます：</br></br>
          　（´-`）.｡oO（イベントに画像を投稿できるといいなあ</br>
          　（´-`）.｡oO（カレンダーの日付をクリックしてイベントを追加できるといいなあ</br>
          　（´-`）.｡oO（イベントの「場所」をGoogle Mapsと連携できるといいなあ</br>
          　（´-`）.｡oO（イベントのチケット情報をもっと細かく管理できるといいなあ(ざっくり)</br>
          　（´-`）.｡oO（他の人のイベントにコメントできたら面白いかなあ</br>
          </br></br></br>
          ちなみにヲタスケは下記の環境で動作確認を行っています。</br>
          </br>
          ・OS：Windows7/10, iOS(iPhone)</br>
          ・ブラウザ：Google Chrome, Microsoft IE/Edge, Safari</br>
          </br>
          一応Firefoxも見てるんですけどFirefoxだと微妙にレイアウト崩れたりするみたいなのでできればFirefox以外での利用をおすすめします。</br>
          あとiPhone5くらいのスマホディスプレイサイズでも快適に使える操作性を目指してます。</br>
          スマホだとここが使いにくい！とかあればそちらも遠慮なくお知らせください！</br>
          </br>
          みなさま楽しいヲタライフを（　´ Д ｀）ﾉｼ
      </p>
    </div><!-- /.item -->
  </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div><!-- /.chat -->
</div>
