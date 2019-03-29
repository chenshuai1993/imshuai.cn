<?php

namespace App\Admin\Controllers;

use App\Models\Nav;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class NavController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('导航')
            ->description('前台导航设置')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Nav);

        $grid->id('id')->sortable();
        $grid->name('导航名称');
        $grid->sort('排序');
        $grid->status('状态')->display(function ($status) {
            return $status == 1 ? '显示' : '不显示';
        });

        $grid->menus('菜单')->display(function ($menus) {

            $menus = array_map(function ($menu) {
                return "<span class='label label-success'>{$menu['name']}</span>";
            }, $menus);

            return join('&nbsp;', $menus);
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Nav::findOrFail($id));

        $show->id('id');
        $show->name('导航名称');
        $show->sort('排序');
        $show->status('状态');


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Nav);

        $form->text('name', '导航名称');
        $form->number('sort', '排序');
        $form->number('status', '状态');


        return $form;
    }

    //获取导航
    public function navs()
    {
        return Nav::select('id','name as text')->where('status',1)->get();
    }


}
