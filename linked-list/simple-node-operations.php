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
    public function insertBefore( $data = '', $search = '' ) {
        $newNode = new ListNode( $data );

        if( $this->_firstNode ) {
            $currentNode = $this->_firstNode;
            $previous = null;
            while( $currentNode !== null ) {
                if( $currentNode->data === $search ) {
                    $previous->next = $newNode;
                    $newNode->next = $currentNode;
                    $this->_totalNodes++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    /**
     * Insert after specific node.
     */
    public function insertAfter( $data = null, $query = null ) {
        $newNode = new ListNode( $data );

        if( $this->_firstNode !== null ) {
            $currentNode = $this->_firstNode;
            $nextNode = null;
            while( $currentNode !== null ) {
                if( $currentNode->data === $query ) {
                    $currentNode->next = $newNode;
                    if( $nextNode !== null ) {
                        $newNode->next = $nextNode;
                    }
                    $this->_totalNodes++;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
    }

    /**
     * Deleting first node.
     */
    public function deleteFirst() {
        if( $this->_firstNode ) {
            if( $this->_firstNode->next !== null ) {
                $this->_firstNode = $this->_firstNode->next;
            } else {
                $this->_firstNode = null;
            }
            $this->_totalNodes--;
            return true;
        }
        return false;
    }

    /**
     * Deleting last node.
     */
    public function deleteLastNode() {
        if( $this->_firstNode !== null ) {
            $currentNode = $this->_firstNode;
            if( $this->_firstNode->next === null ) {
                $this->_firstNode = null;
            } else {
                $previousNode = null;
                while( $currentNode->next !== null ) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }
                $previousNode->next = null;
            }
            $this->_totalNodes--;
            return true;
        }
        return false;
    }

    /**
     * Find and delete node.
     */
    public function findAndDelete( $query = null ) {
        if( $this->_firstNode !== null ) {
            $currentNode = $this->_firstNode;
            while( $currentNode !== null ) {
                if( $currentNode->data === $query ) {
                    if( $currentNode->next === null ) {
                        $previous->next = null;
                    } else {
                        $previous->next = $currentNode->next;
                    }

                    break;
                } else {
                    $previous = $currentNode;
                    $currentNode = $currentNode->next;
                }
            }
            $this->_totalNodes--;
            return true;
        }
        return false;
    }
}

$linkedlist = new LinkedList();
$linkedlist->insertIntoFirst('10');
$linkedlist->insertIntoFirst('20');
$linkedlist->insertIntoFirst('30');
$linkedlist->insertBefore('150', '30');
// $linkedlist->insertAfter('150', '20');
// $linkedlist->findAndDelete('50');
// $linkedlist->deleteFirst();
// $linkedlist->deleteLastNode();
$linkedlist->displayNodes();
// $searchNode = $linkedlist->searchNode('Md hemal akhand');