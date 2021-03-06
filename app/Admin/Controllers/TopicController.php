<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Topic;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TopicController extends Controller
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
            ->header('Index')
            ->description('description')
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
        $grid = new Grid(new Topic);
        $grid->model()->orderBy('id', 'desc');

        $grid->id('Id')->sortable();
        $grid->title('标题');
        $grid->user()->name('用户');
        $grid->category()->name('分类');
        $grid->tags()->display(function($tags){
            $tags = array_map(function ($tag) {
                return "<span class='label label-success'>{$tag['name']}</span>";
            }, $tags);

            return join('&nbsp;', $tags);
        });
        $grid->reply_count('回复')->sortable();
        $grid->view_count('查看')->sortable();
        $grid->last_reply_user_id('最后回复用户');

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
        $show = new Show(Topic::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->body('Body');
        $show->user_id('User id');
        $show->category_id('Category id');
        $show->reply_count('Reply count');
        $show->view_count('View count');
        $show->last_reply_user_id('Last reply user id');
        $show->order('Order');
        $show->excerpt('Excerpt');
        $show->slug('Slug');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Topic);

        $form->text('title', '标题');
        $form->textarea('body', '内容');
        $form->text('user.name','用户');
        $form->select('category_id','栏目名称')->options(Category::all()->pluck('name', 'id'));
        $form->text('reply_count', '回复数量');
        $form->text('view_count', '查看数量');
        $form->text('last_reply_user_id', '最后回复用户');


        return $form;
    }


}
