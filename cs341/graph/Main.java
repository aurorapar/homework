
import java.util.*;

class Main
{
    public static void main(String[] args)
    {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Enter K-Formula");
        while(true)
        {
            String input = scanner.nextLine();
            if(input.length() > 0)
            {
                LinkedList<Character> stack = new LinkedList<Character>();
                LinkedList<String> out = new LinkedList<String>();
                
                int i=0;
                for(i=0; i < input.length(); i++)
                {
                    if(input.charAt(i) == '*' || Character.isLetter(input.charAt(i)))
                    {
                        if(i>2)
                        {
                            checkStack(stack, out, false);
                        }
                        stack.push(input.charAt(i));            
                    }
                    else
                    {
                        break;
                    }
                }
                if(i < input.length())
                {
                    System.out.println("Bad K-Formula passed");
                    continue;
                }
                
                boolean invalid = false;
                while(stack.size() >= 2)
                {
                    invalid = checkStack(stack, out, true);
                    if(invalid)
                    {
                        System.out.println("Invalid K-Formula!");
                        break;
                    }
                }
                
                if(!invalid)
                {
                    printList("Converted " + input + " to edges ", out);                    
                }
            }
        }
    }
    
    public static boolean checkStack(LinkedList<Character> stack, LinkedList<String> out, boolean finished)
    {
        boolean valid = true;
        if(stack.size() > 2)
        {
            if(Character.isLetter(stack.get(0)) && Character.isLetter(stack.get(1)))
            {
                int index = stack.indexOf('*');
                if(index > -1)
                {            
                    printList("Stack before check: ", stack);
                    char second = stack.pop();
                    char first = stack.pop();
                    index = stack.indexOf('*');
                    stack.remove(index);
                    
                    stack.push(first);
                    String result = "*" + Character.toString(first) + Character.toString(second);                    
                    
                    System.out.println("Created edge " + result);
                    
                    out.push(result);
                    
                    printList("Stack after check: ", stack);
                    checkStack(stack, out, finished);
                    return false;
                }
                else
                {
                    return true;
                }
            }
            else
            {
                if(finished)
                {
                        return true;
                }
            }
        }
        else
        {
            return true;
        }
        if(!valid)
        {
            return true;
        }
        return false;
    }
    
    public static void printList(String startExpr, LinkedList out)
    {
        String output = startExpr;
        for(int i = out.size() - 1; i >= 0; i--)
        {
            output += out.get(i);
        }
        System.out.println(output);
    }
}