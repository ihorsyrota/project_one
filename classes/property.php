<?php
class Property {
    public $id;
    public $type;
    public $contract_type;
    public $title;
    public $description;
    public $price;
    public $currency;
    public $totalArea;
    public $status;
    public $addDateTime;
    public $updateDateTime;

}

class Apartment extends Property {
    public $totalRooms;
    public $floor;
    public $totalFloors;

    public function Add() {
        global $db;
        $this->type = 1;
        $query='INSERT INTO property (
                `type`,
                `contract_type`,
                `title`,
                `description`,
                `price`,
                `currency`,
                `totalRooms`,
                `floor`,
                `totalFloors`,
                `totalArea`,
                `status`
        ) values (
                '.(int)$this->type.',
                '.(int)$this->contract_type.',
                \''.$this->title.'\',
                \''.$this->description.'\',
                '.(float)$this->price.',
                \''.$this->currency.'\',
                '.(int)$this->totalRooms.',
                '.(int)$this->floor.',
                '.(int)$this->totalFloors.',
                '.(float)$this->totalArea.',
                '.(int)$this->status.'
        )
        ';

        $result = $db->execute($query);
        return $result;

    }

    public function Show() {
        return '
            <form method="post" action="/?cmd=Apartment-Add">
                <div>title<br/><input type="text" name="title" id="title"></div>
                <div>description<br/><textarea name="description" id="description"></textarea></div>
                <div>price<br/><input type="text" name="price" id="price"></div>
                <div>currency<br/><select name="currency" id="currency"><option value="UAH">UAH</option><option value="USD">USD</option></select></div>
                <div>totalRooms<br/><input type="text" name="totalRooms" id="totalRooms"></div>
                <div>floor<br/><input type="text" name="floor" id="floor"></div>
                <div>totalFloors<br/><input type="text" name="totalFloors" id="totalFloors"></div>
                <div>totalArea<br/><input type="text" name="totalArea" id="totalArea"></div>
                <div><input type="submit" value="submit"></div>
            </form>		
        ';        
    }

    public function GetList() {
        global $db;
        $query='
            SELECT
                `contract_type`,
                `title`,
                `totalArea`,
                `totalRooms`,
                `floor`,
                `totalFloors`,
                `price`,
                `currency`
            FROM property
            WHERE `type` = 1
        ';
        
        $result = $db->execute($query);
        if ($result) {
            $data = $result->fetchAll();
        } else {
            $data = false;
        }
        return $data;
    }

}

// Houses
class House extends Property {
    public $totalRooms;
    public $totalFloors;

    public function Add() {
        global $db;
        $this->type = 2;
        $query='INSERT INTO property (
                `type`,
                `contract_type`,
                `title`,
                `description`,
                `price`,
                `currency`,
                `totalRooms`,
                `totalFloors`,
                `totalArea`,
                `status`
        ) values (
                '.(int)$this->type.',
                '.(int)$this->contract_type.',
                \''.$this->title.'\',
                \''.$this->description.'\',
                '.(float)$this->price.',
                \''.$this->currency.'\',
                '.(int)$this->totalRooms.',
                '.(int)$this->totalFloors.',
                '.(float)$this->totalArea.',
                '.(int)$this->status.'
        )
        ';
        $result = $db->execute($query);
        return $result;
        
    }

}
?>