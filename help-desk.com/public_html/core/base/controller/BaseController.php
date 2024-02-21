<?php

class BaseController
{
    public function __construct() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/settings/setting.php';
        $connect = new BaseConnect();
        $this->link = $connect->Connect(DATABASE, HOSTNAME, PASSWORD, NAME);
    }
    public function StartCreateTable() {
        $sql = "CREATE TABLE admins (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, login VARCHAR(50), email VARCHAR(50), password VARCHAR(50), answers VARCHAR(10000));";
        $request = mysqli_query($this->link, $sql);
        $sql = "CREATE TABLE users (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, login VARCHAR(50), password VARCHAR(50), post VARCHAR(1000), name VARCHAR(50), surname VARCHAR(50), patronymic VARCHAR(50), messages VARCHAR(50));";
        $request = mysqli_query($this->link, $sql);
        $sql = "CREATE TABLE messages (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, reason VARCHAR(500), level VARCHAR(10), text VARCHAR(10000), autor VARCHAR(50), date VARCHAR(1000), answer VARCHAR(4))";
        $request = mysqli_query($this->link, $sql);
        $sql = "CREATE TABLE code ( code VARCHAR(100))";
        $request = mysqli_query($this->link, $sql);
        $sql = "CREATE TABLE posts (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50), users VARCHAR(10000))";
        $request = mysqli_query($this->link, $sql);
        $sql = "CREATE TABLE answer (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, autor VARCHAR(50), messages VARCHAR(50), text VARCHAR(10000))";
        $request = mysqli_query($this->link, $sql);
        $code = "";
        for ($i = 0; $i < 10; $i++) {
            $ch = rand(0, 9);
            $code = $code . $ch;
        }
        $sql = "INSERT INTO code(code) VALUES (" . $code . ")";
        $request = mysqli_query($this->link, $sql);
        setcookie('code', $code, time() + 30 * 60);
        require_once $_SERVER['DOCUMENT_ROOT'] . "/core/admin/controller/CreateAdminController.php";
        $adm = new CreateAdminController();
        $adm->ShowCreateForm();
    }

    public function ChekCode() {
        $sql = "SELECT code FROM code";
        $result = mysqli_query($this->link, $sql);
        $code = mysqli_fetch_array($result);
        return $code;
    }

    public function ChekCountNews() {
        $sql = "SELECT count(*) FROM posts";
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query);
        return $result;
    }

    public function ChekCountPosts() {
        $sql = 'SELECT * FROM messages ORDER BY id DESC LIMIT 1;';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query);
        return $result;
    }

    public function ChekUserCountPosts() {
        $sql = 'SELECT messages FROM users WHERE login="' . $_COOKIE['user'] . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query)[0];
        return $result;
    }

    public function ChekAnswerNews($id) {
        $sql = 'SELECT answer FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query)[0];
        return $result;
    }
    public function SelectPostsName($id) {
        $sql = 'SELECT name FROM posts WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query);
        return $result[0];
    }

    public function SelectMessagesInfo($id, $users) {
        $sql = 'SELECT reason FROM messages WHERE id="' . $id . '" AND autor="' . $users . '"';
        $query = mysqli_query($this->link, $sql);
        $reason = mysqli_fetch_array($query)[0];
        $sql = 'SELECT level FROM messages WHERE id="' . $id . '" AND autor="' . $users . '"';
        $query = mysqli_query($this->link, $sql);
        $level = mysqli_fetch_array($query)[0];
        $sql = 'SELECT text FROM messages WHERE id="' . $id . '" AND autor="' . $users . '"';
        $query = mysqli_query($this->link, $sql);
        $text = mysqli_fetch_array($query)[0];
        $sql = 'SELECT date FROM messages WHERE id="' . $id . '" AND autor="' . $users . '"';
        $query = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_array($query)[0];
        return $massive = ['reason' => $reason, 'level' => $level, 'text' => $text, 'data' => $data, 'id' => $id];
    }

    public function SelectMessagesInfoFromShow($id) {
        $sql = 'SELECT reason FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $reason = mysqli_fetch_array($query)[0];
        $sql = 'SELECT level FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $level = mysqli_fetch_array($query)[0];
        $sql = 'SELECT text FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $text = mysqli_fetch_array($query)[0];
        $sql = 'SELECT date FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_array($query)[0];
        return $massive = ['reason' => $reason, 'level' => $level, 'text' => $text, 'data' => $data, 'id' => $id];
    }

    public function ChekUserLogin($login) {
        $sql = 'SELECT password FROM users WHERE login="' . $login . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query);
        return $result[0];
    }

    public function ChekFIOFromLogin($login) {
        $sql = 'SELECT name, surname, patronymic FROM users WHERE login="' . $login . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query);
        $mass = $result[1] . ' ' . $result[0] . ' ' . $result[2];
        return $mass;
    }

    public function CreateNewMessages($mass) {
         $sql = 'INSERT INTO messages (reason, level, text, autor, date, answer) VALUES (' . '"' . $mass['reason'] . '", "' . $mass['level'] . '", "' . $mass['text'] . '", "' . $mass['author'] . '", "' . $mass['date'] . '", "' . 'No' . '")';
         $query = mysqli_query($this->link, $sql);
         $id = $this->ChekCountPosts();
         $message = 'SELECT messages FROM users WHERE login="' . $_COOKIE['user'] . '"';
         $query = mysqli_query($this->link, $message);
         $message = mysqli_fetch_array($query)['messages'];
         $sql = 'SELECT id FROM messages WHERE text="' . $mass['text'] . '"';
         $query = mysqli_query($this->link, $sql);
         $id = mysqli_fetch_array($query)[0];

         if(strlen($message) == 1) {
             $message = $id . ',';
         }
         else {
             $message = $message . $id . ',';
         }
         $sql = 'UPDATE users SET messages="' . $message . '" WHERE login="' . $_COOKIE['user'] . '"';
         $query = mysqli_query($this->link, $sql);
         $sql = 'SELECT id FROM messages WHERE date="' . $mass['date'] . '"';
         $query = mysqli_query($this->link, $sql);
         $result = mysqli_fetch_array($query)[0];
         if($query) {
             return $result;
         }
    }

    public function ChekCountAdmin() {
        $sql = 'SELECT count(*) FROM admins';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query)[0];
        return $result;

    }

    public function DeleteMessages($id) {
        $sql = 'DELETE FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        if ($query) {
            return true;
        }
    }

    public function CreateAdmin($login, $email, $password) {
        $sql = 'INSERT INTO admins (login, email, password) VALUES (' . '"' . $login . '", "' . $email . '", "' . $password . '")';
        $query = mysqli_query($this->link, $sql);
        if($query) {
           return true;
        }
    }

    public function CreateAnswer($massive) {
        $sql = 'INSERT INTO answer (autor, messages, text) VALUES (' . '"' . $massive['autor'] . '", "' . $massive['messages'] . '", "' . $massive['text'] . '")';
        $query = mysqli_query($this->link, $sql);
        if($query) {
            $sql = 'UPDATE messages SET answer="' . 'Yes' . '" WHERE id="' . $massive['messages'] . '"';
            $query = mysqli_query($this->link, $sql);
            $sql = 'SELECT answers FROM admins WHERE login="' . $_COOKIE['admin'] . '"';
            $query = mysqli_query($this->link, $sql);
            $answers = mysqli_fetch_array($query)[0];
            $sql = 'UPDATE admins SET answers="' . $answers . $massive['messages'] . "," . '" WHERE login="' . $_COOKIE['admin'] . '"';
            $query = mysqli_query($this->link, $sql);
            if($query) {
                header("Location: http://help-desk.com/wp-admin");
            }
        }
    }
    public function CreateUserAccount($login, $name, $surname, $patronymic, $password, $posts) {
        $sql = 'INSERT INTO users (login, password, post, name, surname, patronymic, messages) VALUES (' . '"' . $login . '", "' . $password . '", "' . $posts . '", "' . $name . '", "' . $surname . '", "' . $patronymic . '", "' . ' ' . '")';
        $query = mysqli_query($this->link, $sql);
        if($query) {
            return true;
        }
    }

    public function CreateNewPosts($name) {
        $sql = "INSERT INTO posts (name) VALUES (" . '"' . $name . '")';
        $query = mysqli_query($this->link, $sql);
        if($query) {
            return true;
        }


    }

    public function ChekAuthorNews($id) {
        $sql = 'SELECT autor FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query)[0];
        return $result;
    }
    public function ChekAdmin($login, $password) {
        $sql = 'SELECT password FROM admins WHERE login="' . $login . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query);
        if($result) {
            $password_in_base = $result[0];
            if($password_in_base === $password) {
                return true;
            }
            else {
                echo "<script>alert('Неверный логин или пароль!')</script>";
            }
        }
        else {
            echo "<script>alert('Неверный логин или пароль!')</script>";
        }
    }

    public function ChekProfileData() {
        $sql = 'SELECT name FROM users WHERE login="' . $_COOKIE['user'] . '"';
        $query = mysqli_query($this->link, $sql);
        $name = mysqli_fetch_array($query)[0];
        $sql = 'SELECT surname FROM users WHERE login="' . $_COOKIE['user'] . '"';
        $query = mysqli_query($this->link, $sql);
        $surname = mysqli_fetch_array($query)[0];
        $sql = 'SELECT patronymic FROM users WHERE login="' . $_COOKIE['user'] . '"';
        $query = mysqli_query($this->link, $sql);
        $patronymic = mysqli_fetch_array($query)[0];
        $sql = 'SELECT post FROM users WHERE login="' . $_COOKIE['user'] . '"';
        $query = mysqli_query($this->link, $sql);
        $post = mysqli_fetch_array($query)[0];
        $messages = $this->ChekUserCountPosts();
        $messages = count(explode(',', $messages));
        $profile = ['name' => $name, 'surname' => $surname, 'patronymic' => $patronymic, 'messages' => $messages, 'posts' => $post];
        return $profile;
    }

    public function ChekProfileAdminData() {
        $sql = 'SELECT email FROM admins WHERE login="' . $_COOKIE['admin'] . '"';
        $query = mysqli_query($this->link, $sql);
        $email = mysqli_fetch_array($query)[0];
        $sql = 'SELECT answers FROM admins WHERE login="' . $_COOKIE['admin'] . '"';
        $query = mysqli_query($this->link, $sql);
        $answers = mysqli_fetch_array($query)[0];
        $data = ['email' => $email, 'answers' => count(explode(',', $answers))-1, 'login' => $_COOKIE['admin']];
        return $data;
    }

    public function SelectAnswerData($id) {
        $sql = 'SELECT text FROM answer WHERE messages="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $text_answer = mysqli_fetch_array($query)[0];
        $sql = 'SELECT reason FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $reason_mess = mysqli_fetch_array($query)[0];
        return $mass = ['text' => $text_answer, 'reason' => $reason_mess, 'id' => $id];

    }

    public function SelectIdNotAnswerNews($id) {
        $sql = 'SELECT id FROM messages WHERE answer="No" AND id > "' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query)[0];
        return $result;
    }

    public function Chek() {
        $sql = 'SELECT count(*) FROM answer';
        $query = mysqli_query($this->link, $sql);
        $count = mysqli_fetch_array($query)[0];
        $massive_answer = [];
        $iterate = 0;
        for ($i=1; $i < $count+1; $i++) {
            $sql = 'SELECT autor FROM answer WHERE id="' . $i . '"';
            $query = mysqli_query($this->link, $sql);
            $result = mysqli_fetch_array($query)[0];
            if ($result === $_COOKIE['admin']) {
                $massive_answer[$iterate] = $i;
                $iterate++;
            }
        }
        return $massive_answer;
    }

    public function ChekCountAnswers() {
        $sql = 'SELECT count(*) FROM answer WHERE autor="' . $_COOKIE['admin'] . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query)[0];
        return $result;
    }

    public function SelectMessagesToAdminInfo($id) {
        $sql = 'SELECT reason FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $reason = mysqli_fetch_array($query)[0];
        $sql = 'SELECT level FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $level = mysqli_fetch_array($query)[0];
        $sql = 'SELECT text FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $text = mysqli_fetch_array($query)[0];
        $sql = 'SELECT date FROM messages WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_array($query)[0];
        return $massive = ['reason' => $reason, 'level' => $level, 'text' => $text, 'data' => $data, 'id' => $id];
    }

    public function ChekAnswersInfo($id) {
        $sql = 'SELECT text FROM answer WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $text = mysqli_fetch_array($query)[0];
        $sql = 'SELECT messages FROM answer WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $id_news = mysqli_fetch_array($query)[0];
        $news_mass = $this->SelectMessagesInfoFromShow($id_news);
        $txt = $news_mass['text'];
        if (strlen($txt) > 8) {
            $txt = substr($txt, 0,14) . "...";
        }
        return $mass = ['text_messages' => $txt, 'text_answers' => $text];
    }

    public function SelectAdminAnswers() {
        $sql = 'SELECT id FROM admins WHERE login="' . $_COOKIE['admin'] . '"';
        $query = mysqli_query($this->link, $sql);
        $id = mysqli_fetch_array($query)[0];
        $sql = 'SELECT answers FROM admins WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query)[0];
        return $result;
    }

    public function SelectFIOByAnswer($id) {
        $sql = 'SELECT messages FROM answer WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $id_message = mysqli_fetch_array($query)[0];
        $sql = 'SELECT autor FROM messages WHERE id="' . $id_message . '"';
        $query = mysqli_query($this->link, $sql);
        $login = mysqli_fetch_array($query)[0];
        $sql = 'SELECT name, surname, patronymic FROM users WHERE login="' . $login . '"';
        $query = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_array($query);
        $fio = $result[1] . ' ' . $result[0] . ' ' . $result[2];
        return $fio;

    }

    public function ChekAnswerInfo($id) {
        $sql = 'SELECT text FROM answer WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $text_answer = mysqli_fetch_array($query)[0];
        $sql = 'SELECT messages FROM answer WHERE id="' . $id . '"';
        $query = mysqli_query($this->link, $sql);
        $mess_id = mysqli_fetch_array($query)[0];
        $sql = 'SELECT reason FROM messages WHERE id="' . $mess_id . '"';
        $query = mysqli_query($this->link, $sql);
        $reason = mysqli_fetch_array($query)[0];
        return ['reason' => $reason, 'text' => $text_answer, 'id' => $id];
    }
}