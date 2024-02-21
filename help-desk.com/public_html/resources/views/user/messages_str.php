<?php
function ShowUserMessagesStr($mass) {
    $id = $mass['id'];
    $author = $mass['author'];
    $reason = $mass['reason'];
    $text = $mass['text'];
    $level = $mass['level'];
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
                    <h3>Заявка</h3>
                  </div>
                  <div class='card__body'>
                    <div class='half'>
                      <div class='description'>
                        <p>Уровень важности: $level</p>
                        <p>Причина:</p>
                        <p>$reason</p>
                      </div>
                    </div>
                    <div class='half'>
                      <div class='description'>
                        <p>Текст заявки: </p>
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
                      <h3>$author</h3>
                    </div>
                    <div class='action'>
                      <a type='button' href='/Delete/$id'>Удалить заявку</a>
                    </div>
                  </div>
                </div>
              </main>
            </body>
            
            </html>";
}