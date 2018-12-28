<?php

namespace app\modules\blog\controllers;
use Yii;
use app\models\Post;
use app\models\PostSearch;
use app\models\Comments;
use app\models\User;

class PostController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
    	$comment = new Comments();

    	if ($comment->load(Yii::$app->request->post())) 
    	{
    		$comment->post_id = $id;
    		$comment->status = 0;
    		$comment->save();
    	}



    	$post = Post::find()->where(['id' => $id])->asArray()->one();
    	$comments = Comments::find()->where(['post_id' => $id])->asArray()->all();
        $author = User::find()->where(['id' => $post['author']])->asArray()->one();

        return $this->render('index', [
        	'post' => $post,
        	'comment' => $comment,
        	'comments' => $comments,
            'author' => $author['username']
        ]);
    }

}
