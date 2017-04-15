<?php

/*Andy Hoch
 *4/4/17
  */ 

class Node
{	
	//each node has a value and an array of children
	//each child in the array is also a node and may have children of its own
    public $value;
    public $children;

	//constructor
    public function __construct($value, $children) {
        $this->value = $value;
        $this->children = $children;        
	}
	
	//returns the height of a tree using recursion
	//the height of a tree is the height of its tallest child + 1;
	//uses depth-first search
	//when run, the function prints the value of each node in the tree followed by its height
	//the order they are printed is the order that the height of each node is discovered by the algorithm (this is called a postorder traversal)
	public function height(){		
		
		//base case
		//a leaf returns a height of zero.
		if ($this->children == null){			
			echo ($this->value),  ": 0", "</br>";		
			return 0;
		}
				
		$h = 0;
		//finds the max height of a group of siblings					
		foreach ($this->children as $i){			
			//here is the recursive call
			$h = max($h, $i->height());														
		}
		$h++;
		echo ($this->value), ": ", (string) $h, "</br>";	
		return $h;		
	}
}

//class for a tree
class Tree
{
    protected $root;
	
    public function __construct() {
        $this->root = null;
	}    
}


//test example

//creates nodes
$A = new Node("A", null);
$B = new Node("B", null);
$C = new Node("C", null);
$D = new Node("D", null);
$E = new Node("E", null);
$F = new Node("F", null);
$G = new Node("G", null);
$H = new Node("H", null);
$I = new Node("I", null);
$J = new Node("J", null);
$K = new Node("K", null);

//organizes those nodes into a tree
//$A is the root
$A->children = [$B,$C,$E];
$B->children = [$D];
$D->children = [$F,$H];
$F->children = [$G];
$H->children = [$I];
$I->children = [$J];
$J->children = [$K];

//prints the height of the tree
$x = $A->height();
echo "The height of the tree is: ", (string) $x;
