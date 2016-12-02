/*
Aurora Pariseau
Class for Linked List implementation
Only methods for the assignment have been added,
not a fully functional Linked List
*/

import java.util.*;

class LinkedList
{    
    Node head = new Node();
    Node tail = head;
    static final boolean DEBUG = false;
    
    public LinkedList()
    {
        /* Initally empty List */
    }
    
    public void debug(String output)
    {
        if(DEBUG)
        {
            System.out.println("\n\t"+output+"\n");
        }
    }
    
    public void print()
    {
        /* Displays all data fields of the list */
        Node printNode = head;
        while(printNode.getData() != Integer.MIN_VALUE)
        {
            System.out.println(printNode.getData());
            if(printNode.getNext() != null)
            {
                printNode = printNode.getNext();
            }
            else
            {
                break;
            }
        }
    }
    
    public void addItem(int input)
    {
        /*  Adds a new node to the end of the list */
        
        if(head.getData() == Integer.MIN_VALUE) // Default value (empty list)
        {
            head.setData(input);
        }
        else                                    // Insert at end of list
        {
            Node newNode = new Node(input);
            this.tail.setNext(newNode);
            this.tail = newNode;
        }        
    }
    
    public void addSortedItem(int input)
    {
        /* Adds an item to the list
            this will sort the list, 
            with largest items at 
            the end                 */
            
        debug("Inserting " + input);
        Node myNode = head;
        if(myNode.getData() == Integer.MIN_VALUE) // Default value (empty list)
        {
            debug("Inserted as head");
            this.addItem(input);    
        }
        else
        {
            Node newNode = new Node(input);
            
            if(input < myNode.getData()) // Insert at head of list       
            {                
                debug("Inserted at head");
                newNode.setNext(head);
                head = newNode;
            }
            else
            {
                Node nextNode = myNode.getNext();
                while(true)
                {
                    if(nextNode == null) // One item list
                    {
                        debug("Next node is null");
                        myNode.setNext(newNode);
                        this.tail = newNode;
                        break;
                    }
                    
                    if(nextNode == this.tail) // Reached end of list
                    {
                        debug("Reached end of list");
                        debug("Tail data: "+this.tail.getData());
                        this.tail.setNext(newNode);
                        this.tail = newNode;
                        break;
                    }
                    
                    if(nextNode.getData() < input) // Move to next item of list (not less than input)
                    {
                        debug("Moving to next node");
                        myNode = nextNode;
                        nextNode = nextNode.getNext();
                    }                    
                    
                    else                            // Insert in position
                    {
                        debug("Inserted after " + myNode.getData());
                        myNode.setNext(newNode);
                        newNode.setNext(nextNode);
                        break;
                    }
                }                                
            }
        }        
    }
}








