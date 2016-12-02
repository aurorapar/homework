/*
Aurora Pariseau
Class for Node implementation
*/

import java.util.*;

class Node
{    
    private Node left = null;
    private char data = Character.MIN_VALUE;
    private Node right = null;
     
    public Node()
    {
     
    }    
    
    public Node(char data)
    {
        this.setData(data);
    }
    
    public char getData()
    {
        return this.data;
    }
    
    public void setData(char input)
    {
        this.data = input;
    }
    
    public Node getLeft()
    {
        return this.left;
    }
    
    public void setLeft(Node node)
    {
        this.left = node;
    }
    
    public Node getRight()
    {
        return this.right;
    }
    
    public void setRight(Node node)
    {
        this.right = node;
    }
}