<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Topic;
use App\Models\Category;
use App\Models\User;
use App\Models\Link;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Handlers\ImageUploadHandler;

use App\Services\CategoriesService;
use App\Services\TopiceService;
use App\Services\NavsService;


class TopicsController extends Controller
{
    public  $categoriesService;
    public  $topiceService;
    public  $navsService;

    public function __construct(CategoriesService $categoriesService,TopiceService $topiceService,NavsService $navsService)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

        $this->categoriesService = $categoriesService;
        $this->topiceService = $topiceService;
        $this->navsService = $navsService;
    }

	public function index(Request $request, Topic $topic, User $user, Link $link)
	{
	    $categories = $this->categoriesService->getCategories();
        $topics = $topic->withOrder($request->order)->paginate(20);
        $active_users = $user->getActiveUsers();
        $links = $link->getAllCached();
        $navs = $this->navsService->getNavs();

        #dd($navs);

		return view('topics.index', compact('topics', 'active_users', 'links', 'categories','navs'));
	}

    public function show(Request $request, Topic $topic)
    {
    	// URL 矫正
        if ( ! empty($topic->slug) && $topic->slug != $request->slug) {
            return redirect($topic->link(), 301);
        }

        #$parser = new \HyperDown\Parser;
        #$topic->body = $parser->makeHtml($topic->body);
        return view('topics.show', compact('topic'));
    }

	public function create(Topic $topic)
	{
		$categories = $this->categoriesService->getCategories();
		return view('topics.create_and_edit', compact('topic', 'categories'));
	}

	public function store(TopicRequest $request, Topic $topic)
	{

	    $this->topiceService->store($request->all());
        return redirect()->to($topic->link())->with('message', '创建帖子成功！');
	}

	public function edit(Topic $topic)
	{
        $this->authorize('update', $topic);
        $categories = Category::all();
        return view('topics.create_and_edit', compact('topic', 'categories'));
   }

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		#$topic->update($request->all());

        $this->topiceService->update($topic,$request->all());
        return redirect()->to($topic->link())->with('message', '更新帖子成功！');
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('message', '删除帖子成功！');
	}

	//图片上传
	public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}