<?php

namespace App\Admin\Controllers;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MenuController extends Controller
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
            ->header('菜单配置')
            ->description('菜单配置')
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
        $grid = new Grid(new Menu);

        $grid->id('id')->sortable();
        $grid->name('名称');
        $grid->url('Url');
        $grid->pid('Pid');
        $grid->nav()->name('所属导航');
        $grid->sort('排序');
        $grid->status('状态')->display(function($status){
            return $status == 1 ? '显示' : '不显示';
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
        $show = new Show(Menu::findOrFail($id));

        $show->id('Id');
        $show->name('名称');
        $show->url('Url');
        $show->pid('Pid');
        $show->nav_id('所属导航');
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
        $form = new Form(new Menu);

        $form->text('name', '名称');
        $form->url('url', 'Url');
        $form->number('pid', 'Pid');
        //$form->number('nav_id', '所属导航');

        $form->select('nav_id','所属导航')->options('/api/navs');
        $form->number('sort', '排序')->default(1);
        $form->number('status', '状态')->default(1);

        return $form;
    }

}
