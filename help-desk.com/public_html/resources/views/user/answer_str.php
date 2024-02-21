<?php

function ShowUserAnswersStr($mass, $fio) {
    $reason = $mass['reason'];
    $text = $mass['text'];
    echo "
            <link href='/resources/css/messages_str.css' rel='stylesheet' type='text/css'>
            <html>
            <body>
              <main>
                <div class='card'>
                  <div class='card__title'>
                    <div class='icon'>
                      <a href='#'><i class='fa fa-arrow-left'></i></a>
                </div>
                    <h3>Ответ на заявку</h3>
                  </div>
                  <div class='card__body'>
                    <div class='half'>
                      <div class='description'>
                        <p>Причина:</p>
                        <p>$reason</p>
                      </div>
                    </div>
                    <div class='half'>
                      <div class='description'>
                        <p>Текст ответа: </p>
                        <p>$text</p>
                      </div>
                      <div class='reviews'>
                        <ul class='stars'>
                          <li><i class='fa fa-star'></i></li>
                          <li><i class='fa fa-star'></i></li>
                          <li><i class='fa fa-star'></i></li>
                          <li><i class='fa fa-star'></i></li>
                          <li><i class='fa fa-star-o'></i></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class='card__footer'>
                    <div class='recommend'>
                      <p>Отправлено от:</p>
                      <h3>$fio</h3>
                    </div>
                    <div class='action'>
                      <a type='button' href='/main'>На главную</a>
                    </div>
                  </div>
                </div>
              </main>
            </body>
            
            </html>";
}
