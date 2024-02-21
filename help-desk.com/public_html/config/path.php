<?php
const PATH_TO_CLASSES = [
    '/core/admin/controller/',
    '/core/admin/model/',
    '/core/user/controller/',
    '/core/user/models/',
    '/routes/',
    '/core/setting/',
    '/core/base/controller/',
    '/core/user/controller/'
];

const PATH_TO_CONTROLLER = [
    'Start' => [
        'controller' => 'SettingController',
        'name' => 'Start',
        'path' => PATH_TO_CLASSES[5],
        'action' => 'ShowSettingStr'
    ],
    'Start_process' => [
        'controller' => 'SettingController',
        'name' => 'Start_process',
        'path' => PATH_TO_CLASSES[5],
        'action' => 'Start_process',
    ],
    'Create_admin' => [
        'controller' => 'CreateAdminController',
        'name' => 'Create_admin',
        'path' => PATH_TO_CLASSES[0],
        'action' => 'ShowCreateForm'
    ],
    'Chekcode' => [
        'controller' => 'AuthController',
        'name' => 'Chekcode',
        'path' => PATH_TO_CLASSES[7],
        'action' => 'ChekCode'
    ],
    'Register' => [
        'controller' => 'AuthController',
        'name' => 'Register',
        'path' => PATH_TO_CLASSES[7],
        'action' => 'ShowRegisterForm'
    ],
    'Register_process' => [
        'controller' => 'AuthController',
        'name' => 'Register_process',
        'path' => PATH_TO_CLASSES[7],
        'action' => 'Register_Process'
    ],
    'Auth' => [
        'controller' => 'AuthController',
        'name' => 'Auth',
        'path' => PATH_TO_CLASSES[7],
        'action' => 'ShowAuthForm'
    ],
    'Auth_process' => [
        'controller' => 'AuthController',
        'name' => 'Auth_process',
        'path' => PATH_TO_CLASSES[7],
        'action' => 'Auth_Process'
    ],
    'Logout' => [
        'controller' => 'AuthController',
        'name' => 'Logout',
        'path' => PATH_TO_CLASSES[7],
        'action' => 'Logout'
    ],
    'Createadmin' => [
        'controller' => 'CreateAdminController',
        'name' => 'Createadmin',
        'path' => PATH_TO_CLASSES[0],
        'action' => 'CreateAdminProcess'
    ],
    'Answer' => [
        'controller' => 'AnswersController',
        'name' => 'Answer',
        'path' => PATH_TO_CLASSES[7],
        'action' => 'ShowConcretAnswer'
    ]
];

const ADMIN_CONTROLLER = [
    'Auth' => [
        'controller' => 'AuthAdminController',
        'name' => 'Auth',
        'path' => PATH_TO_CLASSES[0],
        'action' => 'ShowAuthAdminForm'
    ],
    'Authprocess' => [
        'controller' => 'AuthAdminController',
        'name' => 'Authprocess',
        'path' => PATH_TO_CLASSES[0],
        'action' => 'AuthProcess'
    ],
    'Create_new_admin' => [
        'controller' => 'CreateAdminController',
        'name' => 'Create_new_admin',
        'path' => PATH_TO_CLASSES[0],
        'action' => 'ShowCreateForm'
    ],
    'Messages' => [
        'controller' => 'ShowMessagesStrController',
        'name' => 'Messages',
        'path' => PATH_TO_CLASSES[0],
        'action' => 'ShowAllMessagesAdmin'
    ],
    'Answerprocess' => [
        'controller' => 'AnswerController',
        'name' => 'Answerprocess',
        'path' => PATH_TO_CLASSES[0],
        'action' => 'AnswerProcess'
    ],
    'Answers' => [
        'controller' => 'AnswerController',
        'name' => 'Answers',
        'path' => PATH_TO_CLASSES[0],
        'action' => 'ShowAllAnswers'
    ],
    'Sendposts' => [
        'controller' => 'PostsController',
        'name' => 'Sendposts',
        'path' => PATH_TO_CLASSES[0],
        'action' => 'SendPostsProcess'
    ],
    'Logout' => [
        'controller' => 'AuthAdminController',
        'name' => 'Logout',
        'path' => PATH_TO_CLASSES[0],
        'action' => 'Logout'
    ]
];