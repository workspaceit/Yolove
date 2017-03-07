<?php

App::uses('AppModel', 'Model');

/**
 * Item Model
 *
 */
class Item extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'item';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

    public function deleteProduct($share = null) {
        $this->id = $share['item_id'];
        $this->delete();
        $db = ConnectionManager::getDataSource('default');
        $db->rawQuery("DELETE FROM attachment WHERE id=" . $share['item_id']);
        $db->rawQuery("DELETE FROM comment WHERE share_id=" . $share['item_id']);
        $db->rawQuery("DELETE FROM favorite_sharing WHERE share_id=" . $share['item_id']);
        $db->rawQuery("DELETE FROM activity WHERE (act_code !='follow' or act_code !='addlikealbum') and rel_id =" . $share['item_id']);
        
        App::import('model', 'Category');
        $category = new Category();
        $category->reduceShare($share['category_id']);

        App::import('model', 'Album');
        $album = new Album();
        $album->reduceAlbumShare($share['album_id']);
        
        App::import('model', 'User');
        $user = new User();
        $user->reduceUserShare($share['user_id']);

    }

}
