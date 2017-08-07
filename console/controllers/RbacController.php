<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;
use yii\base\InvalidParamException;

class RbacController extends Controller
{
    /**
     * Create all default roles and permissions of the system
     * [Roles]
     * Root: Biggest role. It can do everything and manage role/permission
     * Admin: Can do everything in system without role/permission
     * User Manager: Manage user
     * Content Manager: Manage content
     *
     * [Permissions]
     * 
     * yii rbac/init
     */
    public function actionInit()
    {
        if (!$this->confirm("Are you sure? It will re-create permissions tree.")) {
            return self::EXIT_CODE_NORMAL;
        }

        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // Role: root
        $root = $auth->createRole('root');
        $root->description = 'Root Admin';
        $auth->add($root);

        // Role: admin
        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $auth->add($admin);

        // Role: user_manager
        $user_manager = $auth->createRole('user_manager');
        $user_manager->description = 'User Manager';
        $auth->add($user_manager);

        // Role: content_manager
        $content_manager = $auth->createRole('content_manager');
        $content_manager->description = 'Content Manager';
        $auth->add($content_manager);

        $auth->addChild($admin, $user_manager);
        $auth->addChild($admin, $content_manager);
        $auth->addChild($root, $admin);
    }
}