<?php

App::uses('AppModel', 'Model');

/**
 * Album Model
 *
 */
class Album extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'album';
    public $primaryKey = 'id';
    public $belongsTo = array(
        'category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        ),
    );

    public function reduceAlbumShare($id) {
        $sql = "select * from album where id=$id";
        $album = $this->query($sql);
        if ($album[0]['album']['total_share'] != 0) {
            $album[0]['album']['total_share'] = $album[0]['album']['total_share'] - 1;
            $newalbum['Album'] = $album[0]['album'];
            $this->save($newalbum);
        }
    }

    public function deleteAlbum($id = null,$userId = null) {
        if($userId){
            App::import('model', 'User');
            $user = new User();
            $user->reduceUserAlbum($userId);
        }
        $db = ConnectionManager::getDataSource('default');
        $db->rawQuery("DELETE FROM favorite_album WHERE album_id=" . $id);
        $db->rawQuery("DELETE FROM activity WHERE act_code ='addlikealbum' and rel_id =" . $id);
        $sql = "select * from share where album_id=$id";
        $shares = $this->query($sql);
        App::import('model', 'Item');
        $item = new Item();
        if (count($shares)) {
            foreach ($shares as $key => $share) {
                $item->deleteProduct($share['share']);
                $db->rawQuery("DELETE FROM share WHERE id=" . $share['share']['id']);
            }
        }
    }

}
