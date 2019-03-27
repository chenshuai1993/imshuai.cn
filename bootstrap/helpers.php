<?php

//路由名称
function route_class(){
	return str_replace('.', '-', Route::currentRouteName());
}

//导航
function category_nav_active($category_id)
{
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}

//话题简介
function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return str_limit($excerpt, $length);
}

//导航
if(! function_exists('web_navs') ){
    function web_navs(){

        //导航
        $catesObj = Cate::select('id','name','nav_id')->where('status','1')->orderBy('sort','desc')->get();
        $catesArr = $catesObj->toArray();

        $nav_name_list = [];
        foreach ($catesObj as $key => $value){
            $nav_name_list[$value->nav->id] = $value->nav->name;
        }

        $nav_list = [];
        foreach ($catesArr as $key => $value){
            $nav_list[$value['nav_id']]['cates'][] = $value;
            $nav_list[$value['nav_id']]['nav_name'] = $nav_name_list[$value['nav_id']];
            $nav_list[$value['nav_id']]['cate_id'] = $value['id'];
        }

        return $nav_list;
    }
}

//栏目
if(! function_exists('categories') ){
    function categories(){

        //导航
        $catesObj = Cate::select('id','name','nav_id')->where('status','1')->orderBy('sort','desc')->get();
        $catesArr = $catesObj->toArray();

        $nav_name_list = [];
        foreach ($catesObj as $key => $value){
            $nav_name_list[$value->nav->id] = $value->nav->name;
        }

        $nav_list = [];
        foreach ($catesArr as $key => $value){
            $nav_list[$value['nav_id']]['cates'][] = $value;
            $nav_list[$value['nav_id']]['nav_name'] = $nav_name_list[$value['nav_id']];
            $nav_list[$value['nav_id']]['cate_id'] = $value['id'];
        }

        return $nav_list;
    }
}