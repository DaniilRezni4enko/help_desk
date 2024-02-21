<?php
function ShowProfile($data) {
    $login = $_COOKIE['admin'];
    $email = $data['email'];
    $answers = $data['answers'];
    echo " <link href='/resources/css/messages_str.css' rel='stylesheet' type='text/css'>
            <html>
            <body>
              <main>
                <div class='card'>
                  <div class='card__title'>
                    <div class='icon'>
                      <a href='#'><i class='fa fa-arrow-left'></i></a>
                </div>
                    <h3>$email</h3>
                  </div>
                  <div class='card__body'>
                    <div class='half'>
                      <div class='description'>
                        <p>Должность: Администратор</p>
                        <p>Всего ответов на заявки: $answers</p>
                       
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