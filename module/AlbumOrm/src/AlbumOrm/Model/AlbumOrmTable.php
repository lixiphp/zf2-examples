<?php

namespace Albumorm\Model;

use Zend\Db\TableGateway\AbstractTableGateway,
    Zend\Db\Adapter\Adapter,
    Zend\Db\ResultSet\ResultSet;

class AlbumormTable extends AbstractTableGateway
{
    protected $table ='album';
    protected $tableName ='album';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet(new Albumorm);

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getAlbumorm($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveAlbumorm(Albumorm $album)
    {
        $data = array(
            'artist' => $album->artist,
            'title'  => $album->title,
        );

        $id = (int)$album->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getAlbumorm($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exit');
            }
        }
    }

    public function addAlbumorm($artist, $title)
    {
        $data = array(
            'artist' => $artist,
            'title'  => $title,
        );
        $this->insert($data);
    }

    public function updateAlbumorm($id, $artist, $title)
    {
        $data = array(
            'artist' => $artist,
            'title'  => $title,
        );
        $this->update($data, array('id' => $id));
    }

    public function deleteAlbumorm($id)
    {
        $this->delete(array('id' => $id));
    }

}
