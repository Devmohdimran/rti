<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogModel;

class BlogController extends Controller
{
    public function addblog()
    {
        return view('admin.blog.add_blog');
    }
    public function storeNewBlog(Request $blogdata){
        $fileName = time() . '.' . $blogdata->file->extension();
        $moveFile = $blogdata->file->move(public_path('assets/images/blogImgs'), $fileName);
        $blog = new BlogModel();
        $blog->blog_title = $blogdata['blog_name'];
        $blog->blog_meta_key = $blogdata['blog_key'];
        $blog->blog_meta_desc = $blogdata['blog_desc'];
        $blog->blog_post_title = $blogdata['blog_title'];
        $blog->blog_url = $blogdata['blog_url'];
        $blog->blog_full_desc = $blogdata['blog_editor'];
        $blog->blog_image = $fileName;
        $blog->save();
        if($blog){
            return redirect('admin/new-blog')->with('status',"Insert successfully");
        }else{
            return redirect('admin/new-blog')->with('failed',"There are someting error, please try some time.");
        }
    }
}
