/*
Aurora Pariseau
Driver class for Application of Linked List Assignment
*/

import java.util.*;

class Main
{
    public static void main(String[] args)
    {
        LinkedList myList = new LinkedList();
        LinkedList sortedList = new LinkedList();
        
        
        /* Just read input when program is called,
           no need for Scanner                      */ 
        for(int arg = 0; arg < args.length; arg++)
        {
            try
            {
                int someInt = Integer.parseInt(args[arg]);
                myList.addItem(someInt);
                sortedList.addSortedItem(someInt);
                
            }
            catch (NumberFormatException e)
            {
                print(args[arg] + " is not a number.");
            }
        }
        print("Unsorted list: ");
        myList.print();
        print("");
        print("Sorted list: ");
        sortedList.print();
    }
    
    public static void print(String output)
    {
        System.out.println(output);
    }
}