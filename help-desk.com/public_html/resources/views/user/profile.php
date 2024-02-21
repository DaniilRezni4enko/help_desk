<?php
function ShowProfile($data) {
    $login = $_COOKIE['user'];
    $name = $data['name'];
    $surname = $data['surname'];
    $patronymic = $data['patronymic'];
    $messages = $data['messages'];
    $posts = $data['posts'];
    $fio = $surname . ' ' . $name . ' ' . $patronymic;
    echo " <link href='/resources/css/messages_str.css' rel='stylesheet' type='text/css'>
            <html>
            <body>
              <main>
                <div class='card'>
                  <div class='card__title'>
                    <div class='icon'>
                      <a href='#'><i class='fa fa-arrow-left'></i></a>
                </div>
                    <h3>$fio</h3>
                  </div>
                  <div class='card__body'>
                    <div class='half'>
                      <div class='description'>
                        <p>Должность: $posts</p>
                        <p>Всего отправлено заявок: $messages</p>
                       
                      </div>
                    </div>
                    <div class='half'>
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
                      <h3>$login</h3>
                    </div>
                    <div class='action'>
                      <a type='button' href='Logout'>Выйти</a>
                    </div>
                  </div>
                </div>
              </main>
            </body>
            
            </html>";


}