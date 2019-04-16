<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ route('topics.create') }}" class="btn btn-success btn-block" aria-label="Left Align">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 新建帖子
        </a>
    </div>
</div>


@if (count($active_users))
    <div class="panel panel-default">
        <div class="panel-body active-users">

            <div class="text-center">活跃用户</div>
            <hr>
            @foreach ($active_users as $active_user)
                <a class="media" href="{{ route('users.show', $active_user->id) }}">
                    <div class="media-left media-middle">
                        <img src="{{ $active_user->avatar }}" width="24px" height="24px" class="img-circle media-object">
                    </div>

                    <div class="media-body">
                        <span class="media-heading">{{ $active_user->name }}</span>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
@endif

<!--官方技术文档-->
<div class="panel panel-default">
    <div class="panel-body active-users">

        <div class="text-center">官方技术文档</div>
        <hr>
        <a class="media" href="https://www.php.net/">
            <div class="media-body">
                <span class="media-heading">PHP文档</span>
            </div>
        </a>
        <a class="media" href="https://dev.mysql.com/doc/">
            <div class="media-body">
                <span class="media-heading">MySql官方文档</span>
            </div>
        </a>
        <a class="media" href="http://man.linuxde.net/">
            <div class="media-body">
                <span class="media-heading">Linux命令学习</span>
            </div>
        </a>
        <a class="media" href="https://learnku.com/docs/laravel/5.5">
            <div class="media-body">
                <span class="media-heading">laravel5.5文档</span>
            </div>
        </a>
        <a class="media" href="https://studygolang.com/">
            <div class="media-body">
                <span class="media-heading">go语言中文网</span>
            </div>
        </a>



    </div>
</div>
<!--业界顶级大佬-->
<div class="panel panel-default">
    <div class="panel-body active-users">

        <div class="text-center">大佬博客</div>
        <hr>
        <a class="media" target="_blank" href="http://www.laruence.com/">
            <div class="media-body">
                <span class="media-heading">鸟哥(风雪之隅	)</span>
            </div>
        </a>
        <a class="media" target="_blank" href="http://www.ruanyifeng.com/home.html">
            <div class="media-body">
                <span class="media-heading">阮一峰</span>
            </div>
        </a>
        <a class="media" target="_blank" href="http://rango.swoole.com/">
            <div class="media-body">
                <span class="media-heading">韩天峰</span>
            </div>
        </a>
        <a class="media" target="_blank" href="https://www.liaoxuefeng.com/">
            <div class="media-body">
                <span class="media-heading">廖雪峰</span>
            </div>
        </a>
    </div>
</div>

@if (count($links))
    <div class="panel panel-default">
        <div class="panel-body active-users">

            <div class="text-center">资源推荐</div>
            <hr>
            @foreach ($links as $link)
                <a class="media" target="_blank" href="{{ $link->link }}">
                    <div class="media-body">
                        <span class="media-heading">{{ $link->title }}</span>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
@endif
<!--我是个demo-->