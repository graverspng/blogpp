<?php
require "models/Blog.php";

class BlogController {

    public function index() {
        $posts = Blog::all();
        require "views/blog/index.view.php";
    }

    public function show($id) {
        $post = Blog::find($id);
        if ($post) {
            require "views/blog/show.view.php";
        } else {
            http_response_code(404);
            echo "Post not found!";
            exit();
        }
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            if (!empty($title) && !empty($content)) {
                Blog::insert([
                    'title' => $title,
                    'content' => $content
                ]);
                header("Location: /");
                exit();
            } else {
                echo "Both title and content are required!";
                exit();
            }
        } else {
            require "views/blog/create.view.php";
        }
    }

    public function edit($id) {
        $post = Blog::find($id);
        if ($post) {
            require "views/blog/edit.view.php";
        } else {
            http_response_code(404);
            echo "Post not found!";
            exit();
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            if (!empty($title) && !empty($content)) {
                Blog::update($id, [
                    'title' => $title,
                    'content' => $content
                ]);
                header("Location: /");
                exit();
            } else {
                echo "Both title and content are required!";
                exit();
            }
        } else {
            http_response_code(405);
            echo "Invalid request method!";
            exit();
        }
    }

    public function delete($id) {
        $post = Blog::find($id);
        if ($post) {
            Blog::delete($id);
            header("Location: /");
            exit();
        } else {
            http_response_code(404);
            echo "Post not found!";
            exit();
        }
    }
}
