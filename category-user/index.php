<h1>Категорія "<?= $categoryName ?>"</h1>
<?php
/* @var $this yii\web\View */
///var_dump($posts);
 
                            if(is_null($posts)) {
                                echo 'Нету постов';
                            } 
                            else{
                                foreach ($posts as $post) {                                    
                                    echo \Yii::$app->view->renderFile('@app/modules/blog/views/post/_prewiev.php', ['post' => $post]);                                    
                                }
                            }
            			
?>
