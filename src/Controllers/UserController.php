<?php
namespace Controllers;

use APP\DatabaseTable;

use APP\Logger;

class UserController
{
    private $userTable;

    public function __construct(DatabaseTable $userTable) {
        $this->userTable = $userTable;
    }

    public function list() {
        $title = 'Users';
        $users = $this->userTable->getAll();

        return [
            'template' => 'user.html.php',
            'title' => $title,
            'variables' => [
                'users' => $users,
                'heading' => 'Users'
            ]
        ];
    }

    public function update() {
        $logger = new Logger("../../logs/logFile");
        $logger->write("UserCntrllr: update, could be add or edit");

        $title = 'Add User'; // default
        $action = 'Add';

        if (isset($_GET['id'])) {
           // update, get the user
            $user = $this->userTable->findById($_GET['id']);
            $title = 'Edit User';
            $action = 'Edit';
        }

        return [
            'template' => 'inputUser.html.php',
            'title' => $title,
            'variables' => [
                'user' => $user,
                'heading' => $action .' User'
            ]
        ];
    }

    public function edit() {
        $logger = new Logger("../../storage/logFile");
        $logger->write("UserCntrllr: edit, just edit");

        $user = $this->userTable->findById($_GET['id']);
        $title = 'Edit User';
        return [
            'template' => 'inputUser.html.php',
            'title' => $title,
            'variables' => [
                'user' => $user,
                'heading' => 'Edit User'
            ]
        ];
    }

    public function save() {
        $logger = new Logger("../../storage/logFile");
        $logger->write("UserCntrllr: save");


        // determine if it's add for update
        // if update, get the record 

        if (($_POST['user']['id']) == '') {
            // insert $_POST['user']
            $fields = $_POST['user'];
            // unset userid so mysql will
            // autoincrement a unique id for insert
            unset($fields['id']);
            $this->userTable->insert($fields);
        } else {
            // update $_POST['user']
            $this->userTable->update($_POST['user']);
        }
        header("location: /flowers/public/user/list");
    }

    public function addEdit() {

        $logger = new Logger("../../storage/logFile");
        $logger->write("UserContr: addEdit ... ooooh nooooo");
        // has user entered input

        // 'POST'
        //    from 'inputUser.html.php'
        //      submit on form for new user
        //      form was empty
        //      or form was filled in, ['user']['id'] != ''
        
        if (isset($_POST['user'])) {
            // is it add or update
            if (
                    (isset ($_POST['user']['id'])) &&
                    (($_POST['user']['id']) == '')
                )
            {
                // it's add, so insert
                $fields = $_POST['user'];
                // unset userid so mysql will
                // autoincrement a unique id for insert
                unset($fields['id']);
                $this->userTable->insert($fields);
            } else {
                 $this->userTable->update($_POST['user']);
            }
            header("location: /flowers/public/user/list");
        } else {
        // 'GET'
        //    from 'user.html.php' 
        //      edit button is anchor link, 'GET' 
            $title = 'Add User'; // default
            $action = 'Add';
            // is it add or update
            if (isset($_GET['id'])) {
                // update, get the user
                $user = $this->userTable->findById($_GET['id']);
                $title = 'Edit User';
                $action = 'Edit';
            }
        }
        return [
            'template' => 'inputUser.html.php',
            'title' => $title,
            'variables' => [
                'user' => $user,
                'heading' => $action .' User'
            ]
        ];
    }
    public function delete() {

        $logger = new Logger("../../storage/logFile");
        $logger->write('UserContr: delete: $_POST[id]');
        $logger->write($_POST['id']);
        $this->userTable->deleteById($_POST['id']);
        header('location: /flowers/public/user/list');
    }

}