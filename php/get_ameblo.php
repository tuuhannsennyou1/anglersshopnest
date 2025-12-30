<?php

  date_default_timezone_set('Asia/Tokyo');

  $url = "http://rssblog.ameba.jp/anglers-shop-nest/rss20.xml";

  $rss =  simplexml_load_file($url);

  $output = '';

  $i = 0;
  $max = 5;

  if($rss){

    foreach( $rss->channel->item as $item ){

      if(!preg_match('/^PR:/',$item->title )){

        if($i < $max){

          $timestamp = strtotime( $item->pubDate );
          
          $date = date( 'Y年m月d日',$timestamp );

          $output .= <<<EOS
            <a class="list-group-item list-group-item-action" href="{$item->link}">
              <p>{$item->title}</p>
              <span class="d-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5"/>
                </svg>
                {$date}
              </span> 
            </a>
          EOS;

          $i++;

        }

      }

    }
  
}

  echo '<ul class="list-group list-group-flush">'. $output . '</ul>';

?>