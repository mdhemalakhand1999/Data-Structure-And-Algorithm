<?php
/**
 * This file is used for do several things.
 * 
 * 1. Create a new node.
 * 2. Insert a node at first.
 * 3. Search a node.
 */

/**
 * This class will create node.
 */
class ListNode {
    // this will store data;
    public $data = null;
    
    // this will store next object as refference.
    public $next = null;

    /**
     * Now let's insert data into node.
     */
    public function __construct( string $data = null ) {
        $this->data = $data;
    }
}

/**
 * Now let's create a node and insert into first.
 */
class LinkedList {
    public $_firstNode = null; // this will store first node.
    
    public $_totalNodes = 0; // this will store total nudes number.

    /**
     * Now let's create and insert into first node.
     */
    public function insertIntoFirst( string $data = null ) {
        $newNode = new ListNode( $data );

        // If firstNode is empty, then insert new node to first node.
        if( $this->_firstNode === null ) {
            $this->_firstNode = $newNode;
        } else {
            /**
             * If first node are not empty, then follow this steps.
             * 
             * 1. make first Node as current node.
             * 2. assign newNode to firstNode.
             * 3. Join firstNode->next to current node object.
             */
            $currentFirstNode = $this->_firstNode;
            $this->_firstNode = $newNode;
            $newNode->next = $currentFirstNode;
            // update node count.
            $this->_totalNodes++;
        }
    }


    /**
     * Now let's display nodes.
     */
    public function displayNodes() {
        // if firstnode are empty then show nodes are empty.
        if( $this->_firstNode === null ) {
            echo 'Nodes are empty';
        } else {
            $currentFirstNode = $this->_firstNode;

            while( $currentFirstNode !== null ) {
                $data = $currentFirstNode->data;
                echo $data ."\n";
                $currentFirstNode = $currentFirstNode->next;
            }
        }
    }

    /**
     * Saerch node.
     */
    public function searchNode( string $search = null ) {
        if( $this->_totalNodes > 0 ) {
            $currentFirstNode = $this->_firstNode;
            while( $currentFirstNode !== null ) {
                print_r($currentFirstNode);
                $data = $currentFirstNode->data;
                if( $data === $search ) {
                    return $currentFirstNode;
                }
                $currentFirstNode = $currentFirstNode->next;
            }
        }
        return false;
    }
}

$linkedlist = new LinkedList();
$linkedlist->insertIntoFirst('Md hemal akhand');
$linkedlist->insertIntoFirst('Md kamal akhand');
$linkedlist->insertIntoFirst('Md Rumel akhand');
$searchNode = $linkedlist->searchNode('Md hemal akhand');