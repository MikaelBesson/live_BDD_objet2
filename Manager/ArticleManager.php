<?php


class ArticleManager{

    private ?PDO $db;

    /**
     * ArticleManager constructor.
     */
    public function __construct(){
        $this->db = DB::getInstance();
    }

    /**
     * return all articles
     */
    public function getArticles(): array {
        $articles =[];
        $stmt = $this->db->prepare("SELECT * FROM article");
        $stmt->execute();
        if($stmt->execute()){
            foreach($stmt->fetchAll() as $item){
                //on crée nos objet de type article
                //$articles[] = new Article($item['id'],$item['title'],$item['content'],$item['date_add']);
                $article = new Article($item['id']);
                $article
                    ->setTitle($item['title'])
                    ->setContent($item['content'])
                    ->setDateAdd($item['date_add'])
                    ;
                $articles[] = $article;
            }
        }
        return $articles;
    }

    /**
     * update un article
     * @param Article $article
     * @return bool
     */
    public function update(Article  $article) : bool {
        if($article->getId()) {
            $stmt = $this->db->prepare("
                UPDATE article SET 
                    title = :title,
                    content = :content
                WHERE id = :id
            ");

            $stmt->bindValue(':title', $article->getTitle());
            $stmt->bindValue(':content', $article->getContent());
            $stmt->bindValue('id', $article->getId());

            return $stmt->execute();
        }
        return false;
    }

    /**
     * insert an article into article table
     * @param Article $article
     * @return bool
     */
    public function insert(Article $article): bool {
        if(is_null($article->getId())) {
            $stmt = $this->db->prepare("
                INSERT INTO article(title,content) VALUES(:title,:content)
            ");

            $stmt->bindValue(':title', $article->getTitle());
            $stmt->bindValue(':content', $article->getContent());

             return $stmt->execute();

        }
        return false;
    }

    /**
     * delete an article
     * @param Article $article
     * @return bool
     */
    public function delete(Article  $article){
        if($article->getId()) {
            $stmt = $this->db->prepare("
                DELETE FROM article WHERE id = :id
            ");

            $stmt->bindValue('id', $article->getId());
            return $stmt->execute();
        }
        return false;
    }



}


