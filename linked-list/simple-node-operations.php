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

    /**
     * Insert a node before specific node.
     * 
     * Data: its data for node.
     * Query: its string for search node.
     */
    public function insertBefore( string $data = null, string $query = null ) {
        $newNode = new ListNode( $data );
        // Do operation if firstNode exists.
        if( $this->_firstNode !== null ) {
            $prevNode = null;
            $currentFirstNode = $this->_firstNode;

            while( $currentFirstNode !== null ) {
                if( $currentFirstNode->data === $query ) {
                    // add data before array.
                    $newNode->next = $currentFirstNode;
                    $prevNode->next = $newNode;
                    $this->_totalNodes++;
                    break;
                }
                $prevNode = $currentFirstNode;
                $currentFirstNode = $currentFirstNode->next;
            }
        }
    }
}

$linkedlist = new LinkedList();
$linkedlist->insertIntoFirst('10');
$linkedlist->insertIntoFirst('20');
$linkedlist->insertIntoFirst('30');
$linkedlist->insertBefore('50', '20');
$linkedlist->displayNodes();
// $searchNode = $linkedlist->searchNode('Md hemal akhand');