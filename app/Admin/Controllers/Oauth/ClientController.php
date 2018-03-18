<?php
namespace App\Admin\Controllers\Oauth;

use App\Admin\Controllers\BaseController;
use App\Models\OauthClient;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Grid;
use Encore\Admin\Form;

class ClientController extends BaseController
{

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('Oauth 客户端');
            $content->description('客户端列表');
            $content->body(Admin::grid(OauthClient::class, function (Grid $grid) {
                $grid->id('客户端ID')->sortable();
                $grid->name('名称');
                $grid->secret('密钥');
                $grid->redirect('回调地址');
                $grid->personal_access_client('个人客户端')->display(function ($data) {
                    return $data ? '是' : '否';
                });
                $grid->password_client('密码客户端')->display(function ($data) {
                    return $data ? '是' : '否';
                });
                $grid->revoked('可用')->display(function ($data) {
                    return $data ? '否' : '是';
                });
                $grid->created_at('创建时间');
                $grid->updated_at('修改时间');
            }));
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('Oauth 客户端');
            $content->description('客户端修改');
            $content->body(Admin::form(OauthClient::class, function (Form $form) {
                $form->display('id', '客户端ID');
                $form->text('name', '名称');
                $form->text('secret', '密钥');
                $form->text('redirect', '回调地址');
                $form->select('personal_access_client', '个人客户端')->options([1 => '是', 0 => '否']);
                $form->select('password_client', '密码客户端')->options([1 => '是', 0 => '否']);
                $form->select('revoked', '可用')->options([1 => '否', 0 => '是']);
            })->edit($id));
        });
    }

}
