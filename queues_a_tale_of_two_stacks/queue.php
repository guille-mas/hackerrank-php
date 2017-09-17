<?php
namespace Guille;

use SplStack;

/**
 * A Queue implemented with two stacks from Standard PHP Library
 * This is an answer to a HackerRank algorithmic challenge
 * @package Guille
 */
class Queue {
  /**
   * @var \SplStack
   */
  private $stack1;
  /**
   * @var \SplStack
   */
  private $stack2;

  public function __construct() {
    $this->stack1 = new SplStack();
    $this->stack2 = new SplStack();
  }

  /**
   * Adds an integer to the Queue
   * @param int $item
   */
  public function enqueue(int $item){
    $this->stack1->push($item);
  }

  /**
   * Pops out the element at the head
   * @return int
   */
  public function dequeue() : int {
    $this->reorderStacks();
    return $this->stack2->pop();
  }

  /**
   * Return the value of the integer at the head
   * @return int
   */
  public function front() : int {
    $this->reorderStacks();
    return $this->stack2->top();
  }

  /**
   * Check if Queue is empty
   * @return bool
   */
  public function isEmpty() : bool {
    return $this->stack1->isEmpty();
  }

  /**
   * move items from first stack to the second
   * to provide a FIFO behaviour
   */
  private function reorderStacks(){
    if(!$this->stack1->isEmpty() && $this->stack2->isEmpty()){
      while(!$this->stack1->isEmpty()){
        $this->stack2->push($this->stack1->pop());
      }
    }
  }

}


