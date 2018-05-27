<?php

namespace Controller;
use Controller\Database as DB;

	class Library extends DB
	{
		public function getAllComment($_id)
		{
			$sql = $this->prepare("SELECT * FROM comments WHERE post_id = $_id ORDER BY id DESC");
			$sql->execute();
			return $sql->fetchAll();
		}

		public function getAllCategory()
		{
			$sql = $this->prepare("SELECT * FROM category_blog");
			$sql->execute();
			return $sql->fetchAll();
		}

		public function getAllBlog($per_page, $offset)
		{
			$sql = $this->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT $per_page OFFSET $offset");
			$sql->execute();
			return $sql->fetchAll();
		}
		public function getAllBlogBySearch($_keyword)
		{
			$sql = $this->prepare("SELECT * FROM posts WHERE title LIKE '%$_keyword%' ORDER BY id DESC");
			$sql->execute();
			return $sql->fetchAll();
		}
		public function getAllBlogByCategory($category_id, $per_page, $offset)
		{
			$sql = $this->prepare("SELECT posts.*, category_blog.category_name
								FROM posts, category_blog
								WHERE posts.id_category =  category_blog.id and id_category = $category_id
								ORDER BY posts.id DESC LIMIT $per_page OFFSET $offset");
			$sql->execute();
			return $sql->fetchAll();
		}
		public function getBlogById($_id)
		{
			$sql = $this->prepare("SELECT posts.*, category_blog.category_name
								FROM posts, category_blog
								WHERE posts.id_category =  category_blog.id and posts.id = $_id
								ORDER BY posts.id DESC");
			$sql->execute();
			return $sql->fetch();
		}

		public function saveData($data)
		{			
			$sql = $this->prepare("INSERT INTO comments (post_id, username, reply) VALUES('$data[post_id]','$data[username]', '$data[reply]')");
			$sql->execute();
		}
		public function countBlogByCategory($category_id)
		{
			$sql = $this->prepare("SELECT COUNT(*) AS count FROM posts WHERE id_category = $category_id");
			$sql->execute();
			return $sql->fetch();
		}
		public function countBlog()
		{
			$sql = $this->prepare("SELECT COUNT(*) AS count FROM posts");
			$sql->execute();
			return $sql->fetch();
		}

 	}