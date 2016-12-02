/*
Aurora Pariseau
Class for Node implementation
*/

import java.util.*;

class Node
{
    private int data = Integer.MIN_VALUE; // Default value, can use to determine if set
    Node next = null;
    
    public Node()
    {
        
    }
    
    public Node(int input)
    {
        data = input;
    }
    
    public int getData()
    {
        return data;
    }
    
    public void setData(int input)
    {
        data = input;
    }
    
    public Node getNext()
    {
        return next;
    }
    
    public void setNext(Node nextNode)
    {
        next = nextNode;
    }
}