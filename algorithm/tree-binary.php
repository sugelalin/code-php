<?php

/*
 * 用PHP 表示二叉树
 */
class Node{
    public $value;
    public $left;
    public $right;
}

/*
 * 树的遍历
 * 1、先序遍历
 * 2、中序遍历
 * 3、后序遍历
 * 4、层次遍历
 */
class TreeSearch
{
    private $tree;
    public function __construct($node = '')
    {
        $this->tree = $node;
    }

    // 并没有用Object 属性 只是为了好看QAQ
    //  先序遍历 根节点 ---> 左子树 ---> 右子树
    function preOrder($root){
        $stack=array();
        array_push($stack,$root);
        while(!empty($stack)){
            $center_node=array_pop($stack);
            echo $center_node->value.' ';//先输出根节点
            if($center_node->right!=null){
                array_push($stack,$center_node->right);//压入左子树
            }
            if($center_node->left!=null){
                array_push($stack,$center_node->left);
            }
        }
    }

    //  中序遍历，左子树---> 根节点 ---> 右子树
    function inOrder($root){
        $stack = array();
        $center_node = $root;
        while (!empty($stack) || $center_node != null) {
            while ($center_node != null) {
                array_push($stack, $center_node);
                $center_node = $center_node->left;
            }

            $center_node = array_pop($stack);
            echo $center_node->value . " ";

            $center_node = $center_node->right;
        }
    }

    //  后序遍历，左子树 ---> 右子树 ---> 根节点
    function tailOrder($root){
        $stack=array();
        $outstack=array();
        array_push($stack,$root);
        while(!empty($stack)){
            $center_node=array_pop($stack);
            array_push($outstack,$center_node);//最先压入根节点，最后输出
            if($center_node->left!=null){
                array_push($stack,$center_node->left);
            }
            if($center_node->right!=null){
                array_push($stack,$center_node->right);
            }
        }
        //var_dump($outstack);die;

        while(!empty($outstack)){
            $center_node=array_pop($outstack);
            echo $center_node->value.' ';
        }

    }

    // 层次遍历
    function levelorder($root)
    {
        if (is_null($root))
            return;

        $node = $root;
        $queue = [];
        array_push($queue, $node);

        while (!is_null($node = array_shift($queue)))
        {
            echo $node->value;
            if ($node->left)
                array_push($queue, $node->left);
            if ($node->right)
                array_push($queue, $node->right);
        }
    }
}

{
    /*
     *                  A
     *                /   \
     *               B      C
     *             /   \   /  \
     *            D    E  F    G
     *
     */
    // 构造二叉树
    $a=new Node();
    $b=new Node();
    $c=new Node();
    $d=new Node();
    $e=new Node();
    $f=new Node();
    $g=new Node();
    $a->value='A';
    $b->value='B';
    $c->value='C';
    $d->value='D';
    $e->value='E';
    $f->value='F';
    $g->value='G';
    $a->left=$b;
    $a->right=$c;
    $b->left=$d;
    $b->right=$e;
    $c->left=$f;
    $c->right=$g;

    // 遍历
    $TreeSearch = new TreeSearch();
    $TreeSearch->preOrder($a);  // A B D E C F G
    $TreeSearch->inOrder($a);   // D B E A F C G
    $TreeSearch->tailOrder($a); // D E B F G C A
}


