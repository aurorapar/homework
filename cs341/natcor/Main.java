
// Aurora Pariseau

import java.util.*;

class Main
{
    public static boolean DEBUG = false;

    public static void main(String[] args)
    {
        Node myList = new Node();
        myList = findNatCor(args[0]);
        
        printList(myList);
        
        inorderTraversal(myList);
        //System.out.println("Inorder Traversal: " + inorderTrav(myList));
        preorderTraversal(myList);
    }   
    
    public static void printList(Node list)
    {
        debug("----------\nPrinting list\n");

        String output = "Node " + Character.toString(list.getData());
        if(list.getLeft() != null)
        {
            printList(list.getLeft());
            output += " has a left child of " + Character.toString(list.getLeft().getData());
        }
        else
        {
            output += " has no left child";
        }
        if(list.getRight() != null)
        {
            printList(list.getRight());
            output += " and has a right child of " + Character.toString(list.getRight().getData());
        }
        else
        {
            output += " and has no right child";
        }
        System.out.println(output);
    }
    
    public static void debug(String output)
    {
        if(DEBUG) System.out.println(output);
    }
    
    public static void preorderTraversal(Node node)
    {
        if(node != null)
        {
            String output = "Preorder Traversal: ";
            output += Character.toString(node.getData());
            output += preorderTrav(node.getLeft());
            output += preorderTrav(node.getRight());
            System.out.println(output);
        }
    }
    
    public static String preorderTrav(Node node)
    {
        String output = "";
        
        if(node != null)
        {
            output += Character.toString(node.getData());
            output += preorderTrav(node.getLeft());
            output += preorderTrav(node.getRight());
        }
        return output;
    }
    
    public static void inorderTraversal(Node node)
    {
        if(node != null)
        {
            String output = "";

            debug("Traversal on left branch");
            output += inorderTrav(node.getLeft());
            debug("Root");
            debug(Character.toString(node.getData()));
            output += Character.toString(node.getData());
            debug("Traversal on right branch");
            output += inorderTrav(node.getRight());
            System.out.println("Inorder Traversal: " + output);
        }
    }
    
    public static String inorderTrav(Node node)
    {
        String output = "";
        LinkedList<Node> stack = new LinkedList<Node>();
        debug("Node null? " + (node == null));
        if(node != null)
        {
            debug("Node data: " + Character.toString(node.getData()));
        }
        while(true)
        {
            while(node != null)
            {
                stack.push(node);
                node = node.getLeft();
            }            
        
            if(stack.size() == 0)
            {
                return output;
            }
            
            node = stack.pop();
            output += Character.toString(node.getData());
            node = node.getRight();
        }
    }
            
    
    public static Node findNatCor(String input)
    {
        debug("Starting at " + input);
        
        Node list = new Node();
        
        LinkedList<Node> stack = new LinkedList<Node>();
        
        input = input.substring(1);
        debug(input);
        char testData = input.charAt(0);

        list.setData(testData);
        
        Node node = list;
        do
        {
            input = input.substring(1);      
            debug("--------------------------\nRunning function on: '" + input + "'");
            testData = input.charAt(0);
            if(testData == '(')
            {
                // Create a new empty node and
                // set it to the left child
                Node tempNode = new Node();
                node.setLeft(tempNode);
                
                // Push parent to stack 
                debug("Item to push to stack: " + Character.toString(node.getData()));
                stack.push(node);
                debug("Item pushed to stack: " + Character.toString(stack.getFirst().getData()));
                
                node = node.getLeft();
                debug("Node (left of parent) after change: " + Character.toString(node.getData()));
                debug("Item pushed to stack after node change: " + Character.toString(stack.getFirst().getData()));
                input = input.substring(1);
                node.setData(input.charAt(0));  
                debug("Value of node after set: " + Character.toString(node.getData()));
            }
            else
            {
                if(testData == ')')
                {
                    if(stack.size() < 1)
                    {
                        return list;
                    }
                    else
                    {
                        node = stack.pop();
                        debug("Setting node to " + Character.toString(node.getData()));
                    }
                }
                else
                {            
                    if(testData != '(' && testData != ')')
                    {      
                        Node prevNode = node;
                
                        debug("Creating right child for '" + Character.toString(node.getData()) + "'");
                        Node tempNode = new Node();
                        node.setRight(tempNode);
                        debug("Right node null? " + (node.getRight() == null));
                        node = tempNode;
                        debug("Right child should be set to " + Character.toString(input.charAt(0)));
                        node.setData(input.charAt(0));
                        debug("Right child (pushed as well): " + Character.toString(node.getData()));
                        if(prevNode.getRight() == null)
                        {
                            debug("WARNING!!! RIGHT CHILD NOT SET!");
                            debug("This node is prevNode: " + Character.toString(prevNode.getData()));
                        }
                        else
                        {
                            debug("Right child of previous node: " + Character.toString(prevNode.getRight().getData()));
                        }
                    }
                }
            }
        }
        while(input.length() > 1);
        return null;
    }
    
}